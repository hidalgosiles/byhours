<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class DedicatedIp extends \Diagomail\AppBundle\Entity\DedicatedIp implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'expirationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'ip', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'dedicatedIpStatus', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'creditIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'dedicatedIpTransaction'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'expirationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'ip', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'dedicatedIpStatus', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'creditIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\DedicatedIp' . "\0" . 'dedicatedIpTransaction'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (DedicatedIp $proxy) {
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
    public function setExpirationDate($expirationDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExpirationDate', [$expirationDate]);

        return parent::setExpirationDate($expirationDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getExpirationDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExpirationDate', []);

        return parent::getExpirationDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\Diagomail\UsersBundle\Entity\Users $user = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setIp(\Diagomail\AppBundle\Entity\Ip $ip = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIp', [$ip]);

        return parent::setIp($ip);
    }

    /**
     * {@inheritDoc}
     */
    public function getIp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIp', []);

        return parent::getIp();
    }

    /**
     * {@inheritDoc}
     */
    public function setDedicatedIpStatus(\Diagomail\AppBundle\Entity\DedicatedIpStatus $dedicatedIpStatus = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDedicatedIpStatus', [$dedicatedIpStatus]);

        return parent::setDedicatedIpStatus($dedicatedIpStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getDedicatedIpStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDedicatedIpStatus', []);

        return parent::getDedicatedIpStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function addDedicatedIpTransaction(\Diagomail\AppBundle\Entity\DedicatedIpTransaction $dedicatedIpTransaction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDedicatedIpTransaction', [$dedicatedIpTransaction]);

        return parent::addDedicatedIpTransaction($dedicatedIpTransaction);
    }

    /**
     * {@inheritDoc}
     */
    public function removeDedicatedIpTransaction(\Diagomail\AppBundle\Entity\DedicatedIpTransaction $dedicatedIpTransaction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeDedicatedIpTransaction', [$dedicatedIpTransaction]);

        return parent::removeDedicatedIpTransaction($dedicatedIpTransaction);
    }

    /**
     * {@inheritDoc}
     */
    public function getDedicatedIpTransaction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDedicatedIpTransaction', []);

        return parent::getDedicatedIpTransaction();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreditIp(\Diagomail\AppBundle\Entity\CreditIp $creditIp = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreditIp', [$creditIp]);

        return parent::setCreditIp($creditIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreditIp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreditIp', []);

        return parent::getCreditIp();
    }

}
