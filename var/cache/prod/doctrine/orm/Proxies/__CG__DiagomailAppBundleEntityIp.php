<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Ip extends \Diagomail\AppBundle\Entity\Ip implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'address', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'enable', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'ipType', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'dedicatedIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'ipPool'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'address', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'enable', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'ipType', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'dedicatedIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Ip' . "\0" . 'ipPool'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Ip $proxy) {
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
    public function setAddress($address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', [$address]);

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', []);

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnable($enable)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnable', [$enable]);

        return parent::setEnable($enable);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnable', []);

        return parent::getEnable();
    }

    /**
     * {@inheritDoc}
     */
    public function addDedicatedIp(\Diagomail\AppBundle\Entity\DedicatedIp $dedicatedIp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDedicatedIp', [$dedicatedIp]);

        return parent::addDedicatedIp($dedicatedIp);
    }

    /**
     * {@inheritDoc}
     */
    public function removeDedicatedIp(\Diagomail\AppBundle\Entity\DedicatedIp $dedicatedIp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeDedicatedIp', [$dedicatedIp]);

        return parent::removeDedicatedIp($dedicatedIp);
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
    public function addIpPool(\Diagomail\AppBundle\Entity\IpPool $ipPool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addIpPool', [$ipPool]);

        return parent::addIpPool($ipPool);
    }

    /**
     * {@inheritDoc}
     */
    public function removeIpPool(\Diagomail\AppBundle\Entity\IpPool $ipPool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeIpPool', [$ipPool]);

        return parent::removeIpPool($ipPool);
    }

    /**
     * {@inheritDoc}
     */
    public function getIpPool()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIpPool', []);

        return parent::getIpPool();
    }

    /**
     * {@inheritDoc}
     */
    public function setIpType(\Diagomail\AppBundle\Entity\IpType $ipType = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIpType', [$ipType]);

        return parent::setIpType($ipType);
    }

    /**
     * {@inheritDoc}
     */
    public function getIpType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIpType', []);

        return parent::getIpType();
    }

}