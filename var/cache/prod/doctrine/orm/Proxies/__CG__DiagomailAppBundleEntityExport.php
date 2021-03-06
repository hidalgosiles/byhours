<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Export extends \Diagomail\AppBundle\Entity\Export implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'name', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'fromDatetime', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'toDatetime', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'estimatedVolume', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'pid', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'url', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'key', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'exportStatus', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'exportType', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'apiKey', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'exportEvents', 'events'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'name', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'fromDatetime', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'toDatetime', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'estimatedVolume', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'pid', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'url', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'key', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'exportStatus', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'exportType', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'apiKey', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\Export' . "\0" . 'exportEvents', 'events'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Export $proxy) {
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
     * {@inheritDoc}
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);

        parent::__clone();
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
    public function setFromDatetime($fromDatetime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFromDatetime', [$fromDatetime]);

        return parent::setFromDatetime($fromDatetime);
    }

    /**
     * {@inheritDoc}
     */
    public function getFromDatetime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFromDatetime', []);

        return parent::getFromDatetime();
    }

    /**
     * {@inheritDoc}
     */
    public function setToDatetime($toDatetime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setToDatetime', [$toDatetime]);

        return parent::setToDatetime($toDatetime);
    }

    /**
     * {@inheritDoc}
     */
    public function getToDatetime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getToDatetime', []);

        return parent::getToDatetime();
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
    public function setUrl($url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrl', [$url]);

        return parent::setUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrl', []);

        return parent::getUrl();
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
    public function setExportStatus(\Diagomail\AppBundle\Entity\ExportStatus $exportStatus = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExportStatus', [$exportStatus]);

        return parent::setExportStatus($exportStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getExportStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExportStatus', []);

        return parent::getExportStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setExportType(\Diagomail\AppBundle\Entity\ExportType $exportType = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExportType', [$exportType]);

        return parent::setExportType($exportType);
    }

    /**
     * {@inheritDoc}
     */
    public function getExportType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExportType', []);

        return parent::getExportType();
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
    public function setEstimatedVolume($estimatedVolume)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstimatedVolume', [$estimatedVolume]);

        return parent::setEstimatedVolume($estimatedVolume);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstimatedVolume()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstimatedVolume', []);

        return parent::getEstimatedVolume();
    }

    /**
     * {@inheritDoc}
     */
    public function setPid($pid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPid', [$pid]);

        return parent::setPid($pid);
    }

    /**
     * {@inheritDoc}
     */
    public function getPid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPid', []);

        return parent::getPid();
    }

    /**
     * {@inheritDoc}
     */
    public function setApiKey(\Diagomail\AppBundle\Entity\ApiKey $apiKey = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApiKey', [$apiKey]);

        return parent::setApiKey($apiKey);
    }

    /**
     * {@inheritDoc}
     */
    public function getApiKey()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApiKey', []);

        return parent::getApiKey();
    }

    /**
     * {@inheritDoc}
     */
    public function addExportEvent(\Diagomail\AppBundle\Entity\ExportEvent $exportEvent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addExportEvent', [$exportEvent]);

        return parent::addExportEvent($exportEvent);
    }

    /**
     * {@inheritDoc}
     */
    public function removeExportEvent(\Diagomail\AppBundle\Entity\ExportEvent $exportEvent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeExportEvent', [$exportEvent]);

        return parent::removeExportEvent($exportEvent);
    }

    /**
     * {@inheritDoc}
     */
    public function getExportEvents()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExportEvents', []);

        return parent::getExportEvents();
    }

    /**
     * {@inheritDoc}
     */
    public function setExportEvents($exportEvents)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExportEvents', [$exportEvents]);

        return parent::setExportEvents($exportEvents);
    }

    /**
     * {@inheritDoc}
     */
    public function getEvents()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEvents', []);

        return parent::getEvents();
    }

    /**
     * {@inheritDoc}
     */
    public function setEvents($events)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEvents', [$events]);

        return parent::setEvents($events);
    }

}
