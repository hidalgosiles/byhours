<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use \Diagomail\AppBundle\Entity\Invoice;
use Knp\Bundle\SnappyBundle\Snappy\LoggableGenerator;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Translation\Translator;
use AppBundle\Model\S3Uploader;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Invoice Helper
 *
 * <pre>
 * Ivan 20/01/2017 Creation
 * </pre>
 *  @version 1.0
 * @author Ivan Hidalgo <ivan@leadiance.net>
 */
class InvoiceHelper
{

    private $em;
    private $user;
    private $S3Uploader;
    private $translator;
    private $templating;
    private $snappyPdf;
    private $uploadFolder;
    private $path;
    private $io;

    /**
     * Construct
     * 
     * @param type $poEm
     * @param type $translator
     * @param type $session
     */
    public function __construct
    (EntityManager $poEm, TwigEngine $templating, LoggableGenerator $snappyPdf,
     $uploadFolder, S3Uploader $S3Uploader, Translator $translator)
    {
        $this->em = $poEm;
        $this->templating = $templating;
        $this->snappyPdf = $snappyPdf;
        $this->uploadFolder = $uploadFolder;
        $this->S3Uploader = $S3Uploader;
        $this->translator = $translator;
    }

    /**
     * Generate the invoice association with the payment.
     *
     * @param integer $liAmount Amount of invoice
     * @param date    $pdDate   Date of invoice
     * @param \Diagomail\UsersBundle\Entity\Users   $poUser User
     *
     * @return \Diagomail\AppBundle\Entity\Invoice
     */
    public function generateInvoice($liAmount, $pdDate, $poUser, SymfonyStyle $poIO)
    {
        $this->io = $poIO;
        $loInvoice = new Invoice();
        $this->user = $poUser;
        $loInvoice->setUser($this->user);
        $lsNumber = $this->getNumberInvoice();
        $loInvoice->setNumber($lsNumber);
        $loInvoice->setAmount($liAmount);
        $loInvoice->setInvoiceDate($pdDate);
        // ---- Set the current accountType of the user ----
        $loAccountType = $this->user->getUserProperties()->getAccountType();
        $loInvoice->setAccountType($loAccountType);
        // ---- Set the currency ----
        $loCurrency = $this->getCurrency();
        $loInvoice->setCurrency($loCurrency);
        // ---- Set vat rate of the user ----
        $liVatRate = $this->getVatRateUser();
        $loInvoice->setVatRate(number_format($liVatRate, 2, '.', ','));

        $this->em->persist($loInvoice);

        return $loInvoice;
    }

    /**
     * Set status of invoice to paid.
     *
     * @param \Diagomail\AppBundle\Entity\Invoice $loInvoice   Invoice
     * @return \Diagomail\AppBundle\Entity\Invoice
     */
    public function updateStatusInvoice($loInvoice)
    {
        $loInvoice->setPaid(true);
        $this->em->persist($loInvoice);

        return $loInvoice;
    }

    /**
     * Get the corresponding currency.
     *
     * @return \Diagomail\AppBundle\Entity\Currency
     */
    private function getCurrency()
    {
        // ---- Set the current currency euro ----
        $loCurrency = $this->em->getRepository('DiagomailAppBundle:Currency')->find(1);

        return $loCurrency;
    }

    /**
     * Get the vat rate corresponding for the user account
     *
     * @return int
     */
    private function getVatRateUser()
    {
        // ---- The country of Diagomail is Spain ----
        $CountryDiagomail = $this->em->getRepository('DiagomailUsersBundle:Country')->find(202);
        // ---- The country of the user ----
        $loCountry = $this->user->getUserProperties()->getCompany()->getCountry();

        if ($CountryDiagomail->getId() == $loCountry->getId()) {
            $vatRate = 21;
        } else {
            // ---- VAT inter-community ----
            $vatRate = 0;
        }

        return $vatRate;
    }

    /**
     * Get the number of invoice.
     *
     * @return string
     */
    private function getNumberInvoice()
    {
        $lsPrefix = 'DIAGO' . date('Y') ;
        // ---- Get the next sequence number of invoice ----
        $lastCountInvoice = $this->getLastCountInvoice($lsPrefix);
        $lsNumber = $lsPrefix . '' . str_pad($lastCountInvoice, 7, '0', STR_PAD_LEFT);
        $this->io->writeln("Generating invoice number: $lsNumber");

        return $lsNumber;
    }

    /**
     * Get the next number of invoice of this year.
     *
     * @param string $psPrefix  Prefix of invoice
     * @return int
     */
    private function getLastCountInvoice($psPrefix)
    {
        $liLenghtPrefix = strlen($psPrefix);
        // ---- Get all invoices of the current year ----
        $loInvoices = $this->em->getRepository('DiagomailAppBundle:Invoice')
                ->getStandardInvoicesOfYear(date('Y'), 'ASC');
        if (!$loInvoices) {
            return 1;
        }

        $liLastCount = 0;
        // ---- Get the last invoice number of year ----
        foreach ($loInvoices as $loInvoice) {
            $lsNumber = $loInvoice->getNumber();
            $liCount = substr($lsNumber, $liLenghtPrefix);
            if (!is_numeric($liCount)) {
                continue;
            }

            if ((int)$liCount > $liLastCount) {
                $liLastCount = (int)$liCount;
            }
        }
        // ---- Retorn the next count of invoice ----
        $liNextCount = $liLastCount + 1;

        return $liNextCount;
    }

    /**
     * Get all information about the invoice.
     *
     * @param Invoice $poInvoice Invoice
     * @return array
     */
    public function getInvoice(Invoice $poInvoice)
    {
        if (is_null($poInvoice->getUrl())) {
            // ---- Create a PDF file and upload to S3 ----
            $this->createPDF($poInvoice);
        }

        // ==== Get the PDF file of S3 ====
        $lsRouteS3 = $poInvoice->getRouteS3();
        $lsFilename = substr($lsRouteS3, (strpos($lsRouteS3, '/', 0) + 1));
        $loFile = $this->S3Uploader->getObject('diagomail-test', $lsRouteS3);

        $laResult = array(
            'filename' => $lsFilename,
            'file' => $loFile,
        );

        return $laResult;
    }

    /**
     * Create a invoice PDF and push to S3 Amazon
     *
     * @param Invoice $poInvoice
     */
    public function createPDF(Invoice $poInvoice)
    {
        // ---- Get Language of user ----
        $lsLang = $this->user->getUserProperties()->getLanguages()->getShortName();

        // ==== Get information of invoice ====
        $laInvoice = array(
            'base_dir' => __DIR__ . '/../../../web/',
            'number' => $poInvoice->getNumber(),
            'date' => $poInvoice->getInvoiceDate()->format('m/d/Y'),
            'account_type' => $poInvoice->getAccountType()->getName(),
            'amount' => number_format(($poInvoice->getAmount() / 100), 2, '.', ','),
            'vat' => $poInvoice->getVatRate(),
            'currency' => $poInvoice->getCurrency()->getSymbol(),
            'lang' => $lsLang
        );

        $laData = array(
            'invoice' => $laInvoice,
            'company' => $this->getCompany($this->user->getUserProperties()->getCompany()),
            'products' => $this->getArticlesInvoice($poInvoice, $lsLang)
        );

        // ==== Generate the invoice PDF file ====
        // ---- Create the invoice ----
        $this->translator->setLocale($lsLang);
        $loInvoiceRender = $this->templating->render('AppBundle:Billing:invoice.html.twig', $laData, null);
        $this->checkFolder();
        $lsFilename = 'Invoice_'.$poInvoice->getNumber().'.pdf';
        $psPathFile = $this->path.'/'.$lsFilename;
        // ---- Create the PDF ----
        $this->snappyPdf->generateFromHtml($loInvoiceRender, $psPathFile);

        // ==== Push the file to S3 ====
        // ---- Indicate the filename and destination route of S3 ----
        $lsKey = 'invoice/'.$lsFilename;

        $this->pushInvoceToS3($poInvoice, $psPathFile, $lsKey);
    }

    /**
     * Push the file to S3 and set The URL in Invoice entity.
     *
     * @param Invoice   $poInvoice  Invoice entity
     * @param string    $psPathFile Path of the origin file
     * @param string    $psKey      Path of the destination file in S3
     */
    protected function pushInvoceToS3(Invoice $poInvoice, $psPathFile, $psKey)
    {
        // ==== Upload file to Amazon S3
        $this->uploadToS3(realpath($psPathFile), $psKey);

        // ==== Get the URL from S3
        $lsUrl = $this->S3Uploader->getObjectUrl('diagomail-test', $psKey);

        // ==== Set configuration params to export entity
        $this->updateInvoice($poInvoice, $lsUrl, $psKey);

        // ==== Remove file from us server
        unlink(realpath($psPathFile));
    }

    /**
     * Upload to S3.
     *
     * @param string $psFile    Route of the file
     * @param string $psKey     Key is the route of S3
     */
    protected function uploadToS3($psFile, $psKey)
    {
        $this->S3Uploader->upload('diagomail-test', $psKey, $psFile);
    }

    /**
     * Check if exist the folder or create folder.
     */
    protected function checkFolder()
    {
        $lsWebPath = __DIR__ . "/../../..";
        $this->path = $lsWebPath . "/web/" . $this->uploadFolder;
        if (!is_dir($this->path)) {
            mkdir($this->path, 0777, true);
        }

        return;
    }

    /**
     * Set Url into Invoice.
     *
     * @param Invoice $poInvoice    Invoice entity
     * @param string  $psUrl        Url of the file
     * @param string  $psKey        Internal route of S3
     */
    protected function updateInvoice($poInvoice, $psUrl, $psKey)
    {
        $poInvoice->setUrl($psUrl);
        $poInvoice->setRouteS3($psKey);
        $this->em->persist($poInvoice);
        $this->em->flush();

        return;
    }

    /**
     * Get information about the company
     *
     * @param /Diagomail/UsersBundle/Entity/Company $poCompany  Company
     * @return array
     */
    protected function getCompany($poCompany)
    {
        $lsUserName = $this->user->getUserPersonalData()->getFirstname(). ' '.
            $this->user->getUserPersonalData()->getLastname();
        $lsCode = $this->user->getUserPersonalData()->getPhoneCodes()->getCode();
        $lsPhone = $this->user->getUserPersonalData()->getPhone();

        $laResult = array(
            'name' => $poCompany->getName(),
            'username' => $lsUserName,
            'email' => $this->user->getEmail(),
            'phone' => $lsCode.' '.$lsPhone,
            'address' => $poCompany->getAddress(),
            'country' => $poCompany->getCountry()->getName(),
            'vat_number' => $poCompany->getVatNumber(),
            'vat_percent' => $this->getVatRateUser()
        );

        return $laResult;
    }

    /**
     * Get the detail of purchase of the invoice.
     *
     * @param /Diagomail/AppBundle/Entity/Invoice $poInvoice  Invoice
     * @param string                              $psLang     Language
     * @return array
     */
    protected function getArticlesInvoice($poInvoice, $psLang)
    {
        $laResult = array();

        // ==== Get the payment transactions of Credits ====
        $loCreditBalances = $this->em->getRepository('DiagomailAppBundle:CreditBalanceTransaction')
                ->findBy(array('invoice' => $poInvoice));
        foreach ($loCreditBalances as $loCreditBalance) {
            $lsSends = number_format($loCreditBalance->getCreditPackage()->getSends(), 0, ',', '.');
            $lsDescription = $this->translator->trans('invoice.articles.credit', array('%string%' => $lsSends), 'Pdf', $psLang);

            $laResult[] = array(
                'article' => $lsDescription,
                'amount' => number_format($loCreditBalance->getAmount() / 100, 2, '.', ',')
            );
        }

        // ==== Get the payment transactions of Dedicated IP's ====
        $loDedicateIps = $this->em->getRepository('DiagomailAppBundle:DedicatedIpTransaction')
                ->findBy(array('invoice' => $poInvoice));
        foreach ($loDedicateIps as $loDedicateIp) {
            $lsIp = $loDedicateIp->getDedicatedIp()->getIp()->getAddress();
            $lsDescription = $this->translator->trans('invoice.articles.ip', array('%string%' => $lsIp), 'Pdf', $psLang);
            
            $laResult[] = array(
                'article' => $lsDescription,
                'amount' => number_format($loDedicateIp->getAmount() / 100, 2, '.', ',')
            );
        }

        return $laResult;
    }
}
