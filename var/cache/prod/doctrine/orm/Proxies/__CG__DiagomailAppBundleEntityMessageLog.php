<?php

namespace Proxies\__CG__\Diagomail\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MessageLog extends \Diagomail\AppBundle\Entity\MessageLog implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'messageId', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'userDomain', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'userMetadata', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'apiKey', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'messageStatus', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'webhookEventLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'emailLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'clickLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'openLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'unsubscribeLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'url', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'complaintLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'bounceHbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'bounceSbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'bounceBlockLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'rejectLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'user'];
        }

        return ['__isInitialized__', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'id', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'creationDate', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'messageId', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'userDomain', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'userMetadata', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'apiKey', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'messageStatus', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'webhookEventLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'emailLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'clickLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'openLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'unsubscribeLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'url', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'complaintLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'bounceHbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'bounceSbLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'bounceBlockLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'rejectLog', '' . "\0" . 'Diagomail\\AppBundle\\Entity\\MessageLog' . "\0" . 'user'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MessageLog $proxy) {
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
    public function setUserMetadata($userMetadata)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserMetadata', [$userMetadata]);

        return parent::setUserMetadata($userMetadata);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserMetadata()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserMetadata', []);

        return parent::getUserMetadata();
    }

    /**
     * {@inheritDoc}
     */
    public function setMessageStatus(\Diagomail\AppBundle\Entity\MessageStatus $messageStatus = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMessageStatus', [$messageStatus]);

        return parent::setMessageStatus($messageStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessageStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessageStatus', []);

        return parent::getMessageStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setMessageId($messageId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMessageId', [$messageId]);

        return parent::setMessageId($messageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessageId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessageId', []);

        return parent::getMessageId();
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
    public function addWebhookEventLog(\Diagomail\AppBundle\Entity\WebhookEventLog $webhookEventLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addWebhookEventLog', [$webhookEventLog]);

        return parent::addWebhookEventLog($webhookEventLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeWebhookEventLog(\Diagomail\AppBundle\Entity\WebhookEventLog $webhookEventLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeWebhookEventLog', [$webhookEventLog]);

        return parent::removeWebhookEventLog($webhookEventLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getWebhookEventLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebhookEventLog', []);

        return parent::getWebhookEventLog();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmailLog(\Diagomail\AppBundle\Entity\EmailLog $emailLog = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmailLog', [$emailLog]);

        return parent::setEmailLog($emailLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmailLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmailLog', []);

        return parent::getEmailLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addClickLog(\Diagomail\AppBundle\Entity\ClickLog $clickLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addClickLog', [$clickLog]);

        return parent::addClickLog($clickLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeClickLog(\Diagomail\AppBundle\Entity\ClickLog $clickLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeClickLog', [$clickLog]);

        return parent::removeClickLog($clickLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getClickLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClickLog', []);

        return parent::getClickLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addOpenLog(\Diagomail\AppBundle\Entity\OpenLog $openLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOpenLog', [$openLog]);

        return parent::addOpenLog($openLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOpenLog(\Diagomail\AppBundle\Entity\OpenLog $openLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOpenLog', [$openLog]);

        return parent::removeOpenLog($openLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getOpenLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOpenLog', []);

        return parent::getOpenLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addUnsubscribeLog(\Diagomail\AppBundle\Entity\UnsubscribeLog $unsubscribeLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUnsubscribeLog', [$unsubscribeLog]);

        return parent::addUnsubscribeLog($unsubscribeLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUnsubscribeLog(\Diagomail\AppBundle\Entity\UnsubscribeLog $unsubscribeLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUnsubscribeLog', [$unsubscribeLog]);

        return parent::removeUnsubscribeLog($unsubscribeLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getUnsubscribeLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUnsubscribeLog', []);

        return parent::getUnsubscribeLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addUrl(\Diagomail\AppBundle\Entity\Url $url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUrl', [$url]);

        return parent::addUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUrl(\Diagomail\AppBundle\Entity\Url $url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUrl', [$url]);

        return parent::removeUrl($url);
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
    public function addComplaintLog(\Diagomail\AppBundle\Entity\ComplaintLog $complaintLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addComplaintLog', [$complaintLog]);

        return parent::addComplaintLog($complaintLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeComplaintLog(\Diagomail\AppBundle\Entity\ComplaintLog $complaintLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeComplaintLog', [$complaintLog]);

        return parent::removeComplaintLog($complaintLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getComplaintLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComplaintLog', []);

        return parent::getComplaintLog();
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
    public function addRejectLog(\Diagomail\AppBundle\Entity\RejectLog $rejectLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRejectLog', [$rejectLog]);

        return parent::addRejectLog($rejectLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRejectLog(\Diagomail\AppBundle\Entity\RejectLog $rejectLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRejectLog', [$rejectLog]);

        return parent::removeRejectLog($rejectLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getRejectLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRejectLog', []);

        return parent::getRejectLog();
    }

    /**
     * {@inheritDoc}
     */
    public function addBounceBlockLog(\Diagomail\AppBundle\Entity\BounceHbLog $bounceBlockLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addBounceBlockLog', [$bounceBlockLog]);

        return parent::addBounceBlockLog($bounceBlockLog);
    }

    /**
     * {@inheritDoc}
     */
    public function removeBounceBlockLog(\Diagomail\AppBundle\Entity\BounceHbLog $bounceBlockLog)
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
    public function setUserDomain(\Diagomail\AppBundle\Entity\UserDomain $userDomain = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserDomain', [$userDomain]);

        return parent::setUserDomain($userDomain);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserDomain()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserDomain', []);

        return parent::getUserDomain();
    }

}
