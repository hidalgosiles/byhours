<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class StatsAgg extends \Diagomail\AppBundle\Entity\StatsAgg implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'dateHour', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'messages', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'opens', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'clicks', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'softBounces', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'hardBounces', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'blockBounces', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'blacklist', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'complaints', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'unsubscribes'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'user', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'dateHour', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'messages', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'opens', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'clicks', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'softBounces', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'hardBounces', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'blockBounces', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'blacklist', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'complaints', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\StatsAgg' . "\0" . 'unsubscribes'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (StatsAgg $proxy) {
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
    public function setDateHour($dateHour)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateHour', [$dateHour]);

        return parent::setDateHour($dateHour);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateHour()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateHour', []);

        return parent::getDateHour();
    }

    /**
     * {@inheritDoc}
     */
    public function setMessages($messages)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMessages', [$messages]);

        return parent::setMessages($messages);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessages', []);

        return parent::getMessages();
    }

    /**
     * {@inheritDoc}
     */
    public function setOpens($opens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOpens', [$opens]);

        return parent::setOpens($opens);
    }

    /**
     * {@inheritDoc}
     */
    public function getOpens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOpens', []);

        return parent::getOpens();
    }

    /**
     * {@inheritDoc}
     */
    public function setClicks($clicks)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClicks', [$clicks]);

        return parent::setClicks($clicks);
    }

    /**
     * {@inheritDoc}
     */
    public function getClicks()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClicks', []);

        return parent::getClicks();
    }

    /**
     * {@inheritDoc}
     */
    public function setSoftBounces($softBounces)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSoftBounces', [$softBounces]);

        return parent::setSoftBounces($softBounces);
    }

    /**
     * {@inheritDoc}
     */
    public function getSoftBounces()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSoftBounces', []);

        return parent::getSoftBounces();
    }

    /**
     * {@inheritDoc}
     */
    public function setHardBounces($hardBounces)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHardBounces', [$hardBounces]);

        return parent::setHardBounces($hardBounces);
    }

    /**
     * {@inheritDoc}
     */
    public function getHardBounces()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHardBounces', []);

        return parent::getHardBounces();
    }

    /**
     * {@inheritDoc}
     */
    public function setBlockBounces($blockBounces)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBlockBounces', [$blockBounces]);

        return parent::setBlockBounces($blockBounces);
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockBounces()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBlockBounces', []);

        return parent::getBlockBounces();
    }

    /**
     * {@inheritDoc}
     */
    public function setBlacklist($blacklist)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBlacklist', [$blacklist]);

        return parent::setBlacklist($blacklist);
    }

    /**
     * {@inheritDoc}
     */
    public function getBlacklist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBlacklist', []);

        return parent::getBlacklist();
    }

    /**
     * {@inheritDoc}
     */
    public function setComplaints($complaints)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComplaints', [$complaints]);

        return parent::setComplaints($complaints);
    }

    /**
     * {@inheritDoc}
     */
    public function getComplaints()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComplaints', []);

        return parent::getComplaints();
    }

    /**
     * {@inheritDoc}
     */
    public function setUnsubscribes($unsubscribes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUnsubscribes', [$unsubscribes]);

        return parent::setUnsubscribes($unsubscribes);
    }

    /**
     * {@inheritDoc}
     */
    public function getUnsubscribes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUnsubscribes', []);

        return parent::getUnsubscribes();
    }

}