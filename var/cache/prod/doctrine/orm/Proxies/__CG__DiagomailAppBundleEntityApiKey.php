<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ApiKey extends \Diagomail\AppBundle\Entity\ApiKey implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'key', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'available', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'description', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'export', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'apiKeyIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'apiKeyCall', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'messageLog', 'apiCall'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'key', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'available', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'description', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'export', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'apiKeyIp', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'apiKeyCall', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\ApiKey' . "\0" . 'messageLog', 'apiCall'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ApiKey $proxy) {
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
    public function getApiCall()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApiCall', []);

        return parent::getApiCall();
    }

    /**
     * {@inheritDoc}
     */
    public function setApiCall($apiCalls)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApiCall', [$apiCalls]);

        return parent::setApiCall($apiCalls);
    }

    /**
     * {@inheritDoc}
     */
    public function setKey($key)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKey', [$key]);

        return parent::setKey($key);
    }

    /**
     * {@inheritDoc}
     */
    public function getKey()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKey', []);

        return parent::getKey();
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
    public function setAvailable($available)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAvailable', [$available]);

        return parent::setAvailable($available);
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAvailable', []);

        return parent::getAvailable();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function addExport(\Diagomail\AppBundle\Entity\Export $export)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addExport', [$export]);

        return parent::addExport($export);
    }

    /**
     * {@inheritDoc}
     */
    public function removeExport(\Diagomail\AppBundle\Entity\Export $export)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeExport', [$export]);

        return parent::removeExport($export);
    }

    /**
     * {@inheritDoc}
     */
    public function getExport()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExport', []);

        return parent::getExport();
    }

    /**
     * {@inheritDoc}
     */
    public function addApiKeyIp(\Diagomail\AppBundle\Entity\ApiKeyIp $apiKeyIp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addApiKeyIp', [$apiKeyIp]);

        return parent::addApiKeyIp($apiKeyIp);
    }

    /**
     * {@inheritDoc}
     */
    public function removeApiKeyIp(\Diagomail\AppBundle\Entity\ApiKeyIp $apiKeyIp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeApiKeyIp', [$apiKeyIp]);

        return parent::removeApiKeyIp($apiKeyIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getApiKeyIp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApiKeyIp', []);

        return parent::getApiKeyIp();
    }

    /**
     * {@inheritDoc}
     */
    public function addApiKeyCall(\Diagomail\AppBundle\Entity\ApiKeyCall $apiKeyCall)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addApiKeyCall', [$apiKeyCall]);

        return parent::addApiKeyCall($apiKeyCall);
    }

    /**
     * {@inheritDoc}
     */
    public function removeApiKeyCall(\Diagomail\AppBundle\Entity\ApiKeyCall $apiKeyCall)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeApiKeyCall', [$apiKeyCall]);

        return parent::removeApiKeyCall($apiKeyCall);
    }

    /**
     * {@inheritDoc}
     */
    public function getApiKeyCall()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApiKeyCall', []);

        return parent::getApiKeyCall();
    }

    /**
     * {@inheritDoc}
     */
    public function setApiKeyCall($apiKeyCall = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApiKeyCall', [$apiKeyCall]);

        return parent::setApiKeyCall($apiKeyCall);
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
    public function addMessageLog(\Diagomail\AppBundle\Entity\MessageLog $messageLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMessageLog', [$messageLog]);

        return parent::addMessageLog($messageLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMessageLog(\Diagomail\AppBundle\Entity\MessageLog $messageLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMessageLog', [$messageLog]);

        return parent::removeMessageLog($messageLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessageLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessageLog', []);

        return parent::getMessageLog();
    }

}