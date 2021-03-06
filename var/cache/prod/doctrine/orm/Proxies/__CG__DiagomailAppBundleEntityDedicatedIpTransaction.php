<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class DedicatedIpTransaction extends \Diagomail\AppBundle\Entity\DedicatedIpTransaction implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'paymentTransaction', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'amount', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'dedicatedIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'invoice'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'paymentTransaction', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'amount', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'dedicatedIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIpTransaction' . "\0" . 'invoice'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (DedicatedIpTransaction $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPaymentTransaction(\Diagomail\AppBundle\Entity\PaymentTransaction $paymentTransaction = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPaymentTransaction', [$paymentTransaction]);

        return parent::setPaymentTransaction($paymentTransaction);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentTransaction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaymentTransaction', []);

        return parent::getPaymentTransaction();
    }

    /**
     * {@inheritDoc}
     */
    public function setDedicatedIp(\Diagomail\AppBundle\Entity\DedicatedIp $dedicatedIp = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDedicatedIp', [$dedicatedIp]);

        return parent::setDedicatedIp($dedicatedIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getDedicatedIp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDedicatedIp', []);

        return parent::getDedicatedIp();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreationDate($creationDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreationDate', [$creationDate]);

        return parent::setCreationDate($creationDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreationDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreationDate', []);

        return parent::getCreationDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setAmount($amount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAmount', [$amount]);

        return parent::setAmount($amount);
    }

    /**
     * {@inheritDoc}
     */
    public function getAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAmount', []);

        return parent::getAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function setInvoice(\Diagomail\AppBundle\Entity\Invoice $invoice = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInvoice', [$invoice]);

        return parent::setInvoice($invoice);
    }

    /**
     * {@inheritDoc}
     */
    public function getInvoice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInvoice', []);

        return parent::getInvoice();
    }

}
