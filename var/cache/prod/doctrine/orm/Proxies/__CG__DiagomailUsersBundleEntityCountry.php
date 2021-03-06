<?php

namespace Proxies\__CG__\Diagomail\UsersBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Country extends \Diagomail\UsersBundle\Entity\Country implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'id', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'name', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'countryCode', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'billingPaybox', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'company', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'timezone', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'phoneCodes', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'translations'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'id', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'name', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'countryCode', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'billingPaybox', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'company', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'timezone', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'phoneCodes', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\Country' . "\0" . 'translations'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Country $proxy) {
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
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountryCode($countryCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountryCode', [$countryCode]);

        return parent::setCountryCode($countryCode);
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
    public function setBillingPaybox($billingPaybox)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBillingPaybox', [$billingPaybox]);

        return parent::setBillingPaybox($billingPaybox);
    }

    /**
     * {@inheritDoc}
     */
    public function getBillingPaybox()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBillingPaybox', []);

        return parent::getBillingPaybox();
    }

    /**
     * {@inheritDoc}
     */
    public function addCompany(\Diagomail\UsersBundle\Entity\Company $company)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCompany', [$company]);

        return parent::addCompany($company);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCompany(\Diagomail\UsersBundle\Entity\Company $company)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCompany', [$company]);

        return parent::removeCompany($company);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompany()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompany', []);

        return parent::getCompany();
    }

    /**
     * {@inheritDoc}
     */
    public function addPhoneCode(\Diagomail\UsersBundle\Entity\PhoneCodes $phoneCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPhoneCode', [$phoneCode]);

        return parent::addPhoneCode($phoneCode);
    }

    /**
     * {@inheritDoc}
     */
    public function removePhoneCode(\Diagomail\UsersBundle\Entity\PhoneCodes $phoneCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePhoneCode', [$phoneCode]);

        return parent::removePhoneCode($phoneCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhoneCodes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhoneCodes', []);

        return parent::getPhoneCodes();
    }

    /**
     * {@inheritDoc}
     */
    public function addTranslation(\Diagomail\UsersBundle\Entity\Translation\CountryTranslation $translation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTranslation', [$translation]);

        return parent::addTranslation($translation);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTranslation(\Diagomail\UsersBundle\Entity\Translation\CountryTranslation $translation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTranslation', [$translation]);

        return parent::removeTranslation($translation);
    }

    /**
     * {@inheritDoc}
     */
    public function getTranslations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTranslations', []);

        return parent::getTranslations();
    }

}
