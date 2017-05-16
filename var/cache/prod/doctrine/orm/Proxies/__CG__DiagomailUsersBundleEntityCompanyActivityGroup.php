<?php

namespace Proxies\__CG__\Diagomail\UsersBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CompanyActivityGroup extends \Diagomail\UsersBundle\Entity\CompanyActivityGroup implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'id', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'groupCode', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'name', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'companyActivity', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'translations', 'label'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'id', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'groupCode', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'name', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'companyActivity', '' . "\0" . 'Diagomail\\UsersBundle\\Entity\\CompanyActivityGroup' . "\0" . 'translations', 'label'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CompanyActivityGroup $proxy) {
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
    public function getComposedLabel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComposedLabel', []);

        return parent::getComposedLabel();
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
    public function setGroupCode($groupCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGroupCode', [$groupCode]);

        return parent::setGroupCode($groupCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getGroupCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGroupCode', []);

        return parent::getGroupCode();
    }

    /**
     * {@inheritDoc}
     */
    public function addCompanyActivity(\Diagomail\UsersBundle\Entity\CompanyActivity $companyActivity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCompanyActivity', [$companyActivity]);

        return parent::addCompanyActivity($companyActivity);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCompanyActivity(\Diagomail\UsersBundle\Entity\CompanyActivity $companyActivity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCompanyActivity', [$companyActivity]);

        return parent::removeCompanyActivity($companyActivity);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyActivity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyActivity', []);

        return parent::getCompanyActivity();
    }

    /**
     * {@inheritDoc}
     */
    public function addTranslation(\Diagomail\UsersBundle\Entity\Translation\CompanyActivityGroupTranslation $translation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTranslation', [$translation]);

        return parent::addTranslation($translation);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTranslation(\Diagomail\UsersBundle\Entity\Translation\CompanyActivityGroupTranslation $translation)
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