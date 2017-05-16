<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * UserActivity
 *
 * @ORM\Table(name="user_activity")
 * @ORM\Entity
 */
class UserActivity {

    /**
     * @var integer 
     *
     * @ORM\Column(name="id", type="integer", options={"default" = "nextval('user_activity_id_seq'::regclass)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="user_activity_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=false, unique=false)
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", nullable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=true)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="method", type="string", length=20, nullable=true)
     */
    private $method;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", nullable=true)
     */
    private $params;

    /**
     * @var string
     *
     * @ORM\Column(name="params_post", type="text", nullable=true)
     */
    private $paramsPost;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=20, nullable=true)
     * @Assert\Ip(version = "all", message = "userActivity.ip.message")
     */
    private $ip;

    /**
     * @var \UserBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\Users", inversedBy="userActivity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return UserActivity
     */
    public function setDatetime($datetime) {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime() {
        return $this->datetime;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return UserActivity
     */
    public function setLink($link) {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * Set route
     *
     * @param string $route
     *
     * @return UserActivity
     */
    public function setRoute($route) {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * Set params
     *
     * @param string $params
     *
     * @return UserActivity
     */
    public function setParams($params) {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params
     *
     * @return string
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return UserActivity
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\Users $user
     *
     * @return UserActivity
     */
    public function setUser(\UserBundle\Entity\Users $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\Users
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set method
     *
     * @param string $method
     *
     * @return UserActivity
     */
    public function setMethod($method) {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Set paramsPost
     *
     * @param string $paramsPost
     *
     * @return UserActivity
     */
    public function setParamsPost($paramsPost)
    {
        $this->paramsPost = $paramsPost;

        return $this;
    }

    /**
     * Get paramsPost
     *
     * @return string
     */
    public function getParamsPost()
    {
        return $this->paramsPost;
    }
}
