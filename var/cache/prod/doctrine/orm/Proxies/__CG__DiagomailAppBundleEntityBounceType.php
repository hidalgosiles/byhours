<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class BounceType extends \Diagomail\AppBundle\Entity\BounceType implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'name', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'type', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'bounceHbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'bounceSbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'bounceBlockLog'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'name', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'type', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'bounceHbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'bounceSbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\BounceType' . "\0" . 'bounceBlockLog'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (BounceType $proxy) {
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
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function addBounceHbLog(\Diagomail\AppBundle\Entity\BounceHbLog $bounceHbLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addBounceHbLog', [$bounceHbLog]);

        return parent::addBounceHbLog($bounceHbLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeBounceHbLog(\Diagomail\AppBundle\Entity\BounceHbLog $bounceHbLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeBounceHbLog', [$bounceHbLog]);

        return parent::removeBounceHbLog($bounceHbLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getBounceHbLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBounceHbLog', []);

        return parent::getBounceHbLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addBounceSbLog(\Diagomail\AppBundle\Entity\BounceSbLog $bounceSbLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addBounceSbLog', [$bounceSbLog]);

        return parent::addBounceSbLog($bounceSbLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeBounceSbLog(\Diagomail\AppBundle\Entity\BounceSbLog $bounceSbLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeBounceSbLog', [$bounceSbLog]);

        return parent::removeBounceSbLog($bounceSbLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getBounceSbLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBounceSbLog', []);

        return parent::getBounceSbLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addBounceBlockLog(\Diagomail\AppBundle\Entity\BounceBlockLog $bounceBlockLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addBounceBlockLog', [$bounceBlockLog]);

        return parent::addBounceBlockLog($bounceBlockLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeBounceBlockLog(\Diagomail\AppBundle\Entity\BounceBlockLog $bounceBlockLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeBounceBlockLog', [$bounceBlockLog]);

        return parent::removeBounceBlockLog($bounceBlockLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getBounceBlockLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBounceBlockLog', []);

        return parent::getBounceBlockLog();
    }

}
