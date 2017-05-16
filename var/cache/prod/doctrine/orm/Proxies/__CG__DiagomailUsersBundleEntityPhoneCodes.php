<?php

namespace Proxies\__CG__\Diagomail\UsersBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PhoneCodes extends \Diagomail\UsersBundle\Entity\PhoneCodes implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'id', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'code', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'country', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'userPersonalData', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'countryCode'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'id', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'code', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'country', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'userPersonalData', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\PhoneCodes' . "\0" . 'countryCode'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PhoneCodes $proxy) {
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
    public function getCountryCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountryCode', []);

        return parent::getCountryCode();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
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
    public function setCode($code)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCode', [$code]);

        return parent::setCode($code);
    }

    /**
     * {@inheritDoc}
     */
    public function getCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCode', []);

        return parent::getCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry(\Diagomail\UsersBundle\Entity\Country $country = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', [$country]);

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', []);

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function addUserPersonalData(\Diagomail\UsersBundle\Entity\UserPersonalData $userPersonalDatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUserPersonalData', [$userPersonalDatum]);

        return parent::addUserPersonalData($userPersonalDatum);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUserPersonalData(\Diagomail\UsersBundle\Entity\UserPersonalData $userPersonalDatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUserPersonalData', [$userPersonalDatum]);

        return parent::removeUserPersonalData($userPersonalDatum);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserPersonalData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserPersonalData', []);

        return parent::getUserPersonalData();
    }

    /**
     * {@inheritDoc}
     */
    public function addUserPersonalDatum(\Diagomail\UsersBundle\Entity\UserPersonalData $userPersonalDatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUserPersonalDatum', [$userPersonalDatum]);

        return parent::addUserPersonalDatum($userPersonalDatum);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUserPersonalDatum(\Diagomail\UsersBundle\Entity\UserPersonalData $userPersonalDatum)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUserPersonalDatum', [$userPersonalDatum]);

        return parent::removeUserPersonalDatum($userPersonalDatum);
    }

}
