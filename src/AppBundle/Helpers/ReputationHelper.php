<?php
namespace AppBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Reputation Helper
 * <pre>
 * Gheorghe 13/03/2017 Creation
 * </pre>
 * @version 1.0
 * @author Gheorghe Ceban <gheorghe@leadiance.net>
 */
class ReputationHelper
{

    private $em;
    private $hours;

    /**
     * Construct
     * @param type $em
     */
    public function __construct(EntityManager $em, int $hours)
    {
        $this->em = $em;
        $this->hours = $hours;
    }

    /**
     * 
     * @param OutputInterface $poOutput
     */
    public function manage(OutputInterface $poOutput)
    {
        // ==== all users who have sends on the last 8 hours
        $laStats = $this->em->getRepository('DiagomailAppBundle:StatsAgg')->findByHours($this->hours);

        foreach ($laStats as $paStat) {
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    ------------------------------------------------------------.');
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Calculate rating for <info>' . $paStat['username'] . '</info> user.');
            $loUser = $this->em->getRepository('DiagomailUsersBundle:Users')->find($paStat['id']);
            $lfPonderation = 0;
            $liSent = $paStat['messages'];

            // ---- Bounces ponderation
            $liBounces = $paStat['softBounces'] + $paStat['hardBounces'] + $paStat['blockBounces'];
            $this->bouncePonderation($liBounces, $liSent, $lfPonderation);

            // ---- Complaints ponderation
            $liComplaints = $paStat['complaints'];
            $this->complaintPonderation($liComplaints, $liSent, $lfPonderation);

            // ---- Activity ponderation
            $liOpens = $paStat['opens'];
            $liClicks = $paStat['clicks'];
            $this->activityPonderation($liOpens, $liClicks, $lfPonderation);

            // ---- Unsubscribe ponderation
            $liUnsubscribes = $paStat['unsubscribes'];
            $this->unsubscribePonderation($liClicks, $liUnsubscribes, $lfPonderation);

            // ---- Extract reputation level
            $this->updateReputationLevel($lfPonderation, $loUser);

            // ---- Apply reputation to speed quota
            $this->calculateHourlyQuota($lfPonderation);

            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    Old hourly quota is <fg=yellow>' . $loUser->getUserProperties()->getQuotaHourly() . '</>');
            $this->updateHourlyQuota($lfPonderation, $loUser);
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    New hourly quota is <fg=green>' . $loUser->getUserProperties()->getQuotaHourly() . '</>');
            $poOutput->writeln('[' . (date('d-m-Y H:i:s')) . ']' . '    ------------------------------------------------------------.');
        }
    }

    /**
     * Bounce ponderation
     * @param int $piBounces
     * @param int $piSent
     * @param float $pfPonderation
     * @return float
     */
    protected function bouncePonderation(int $piBounces, int $piSent, float &$pfPonderation)
    {
        if (($piBounces / $piSent) > 0.05) {
            $pfPonderation += -0.50;
        } else if (($piBounces / $piSent) > 0.02) {
            $pfPonderation += -0.25;
        } else if (($piBounces / $piSent) < 0.01) {
            $pfPonderation += 0.25;
        }
        return $pfPonderation;
    }

    /**
     * Complaint ponderation
     * @param int $piComplaints
     * @param int $piSent
     * @param float $pfPonderation
     * @return float
     */
    protected function complaintPonderation(int $piComplaints, int $piSent, float &$pfPonderation)
    {
        if (($piComplaints / $piSent) > 0.005) {
            $pfPonderation += -0.50;
        } else if (($piComplaints / $piSent) > 0.003) {
            $pfPonderation += -0.25;
        } else if (($piComplaints / $piSent) < 0.001) {
            $pfPonderation += 0.25;
        }
        return $pfPonderation;
    }

    /**
     * Activity ponderation
     * @param int $piOpens
     * @param int $piClicks
     * @param float $pfPonderation
     * @return float
     */
    protected function activityPonderation(int $piOpens, int $piClicks, float &$pfPonderation)
    {
        if ($piOpens != 0 && $piClicks != 0) {
            if (($piClicks / $piOpens) > 0.45) {
                $pfPonderation += 0.1;
            } else if (($piClicks / $piOpens) < 0.2) {
                $pfPonderation -= 0.1;
            } else if (($piClicks / $piOpens) < 0.1) {
                $pfPonderation -= 0.2;
            }
        }
        return $pfPonderation;
    }

    /**
     * Unsubscribe ponderation
     * @param int $piClicks
     * @param int $piUnsubscribes
     * @param float $pfPonderation
     * @return float
     */
    protected function unsubscribePonderation(int $piClicks, int $piUnsubscribes, float &$pfPonderation)
    {
        if ($piClicks != 0 && $piUnsubscribes != 0) {
            if (($piClicks / $piUnsubscribes) <= 1) {
                $pfPonderation -= 0.1;
            } else if (($piClicks / $piUnsubscribes) >= 8) {
                $pfPonderation += 0.1;
            }
        }
        return $pfPonderation;
    }

    /**
     * Update reputation level
     * @param float $pfPonderation
     * @param \Diagomail\UsersBundle\Entity\Users $poUser
     * @return \Diagomail\UsersBundle\Entity\Users
     */
    protected function updateReputationLevel(float $pfPonderation, \Diagomail\UsersBundle\Entity\Users $poUser)
    {
        $liReputation = '1';
        if ($pfPonderation > 0.50) {
            $liReputation = '2';
        }
        if ($pfPonderation > 0.25) {
            $liReputation = '3';
        }
        if ($pfPonderation > 0.10) {
            $liReputation = '4';
        }
        if ($pfPonderation < -0.10) {
            $liReputation = '5';
        }
        if ($pfPonderation < -0.25) {
            $liReputation = '6';
        }
        if ($pfPonderation < -0.50) {
            $liReputation = '7';
        }
        $loReputation = $this->em->getRepository('DiagomailUsersBundle:UserReputationLevel')->find($liReputation);
        $poUser->getUserProperties()->setReputationLevel($loReputation);
        $this->em->flush();
        return $poUser;
    }

    /**
     * Calculate Hourlu quota
     * @param float $pfPonderation
     * @return float
     */
    protected function calculateHourlyQuota(float &$pfPonderation)
    {
        if ($pfPonderation < 0) {
            $pfPonderation = (1 + $pfPonderation);
        } else {
            $pfPonderation = (1 + $pfPonderation);
        }
        return $pfPonderation;
    }

    /**
     * Update hourly quota
     * @param float $pfPonderation
     * @param \Diagomail\UsersBundle\Entity\Users $poUser
     * @return \Diagomail\UsersBundle\Entity\Users
     */
    protected function updateHourlyQuota(float &$pfPonderation, \Diagomail\UsersBundle\Entity\Users $poUser)
    {
        $poUser->getUserProperties()->setQuotaHourly(number_format($poUser->getUserProperties()->getQuotaHourly() * $pfPonderation, 0, ',', ''));
        $this->em->flush();
        return $poUser;
    }
}
