<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/22/15
 * Time: 3:45 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Column;

/**
 * Class Message
 * @package Pixi\CoreBundle\Entity
 * @Entity
 * @Table(name="messages")
 */
class Message extends PixiModel{
    /**
     * @var
     * @ManyToOne(targetEntity="User")
     */
    protected $from;
    /**
     * @var
     * @ManyToOne(targetEntity="User")
     */
    protected $to;
    /**
     * @var
     * @Column(type="string", length=255)
     */
    protected $subject;
    /**
     * @var
     * @Column(type="text")
     */
    protected $message;


    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set from
     *
     * @param \Pixi\CoreBundle\Entity\User $from
     *
     * @return Message
     */
    public function setFrom(\Pixi\CoreBundle\Entity\User $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \Pixi\CoreBundle\Entity\User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \Pixi\CoreBundle\Entity\User $to
     *
     * @return Message
     */
    public function setTo(\Pixi\CoreBundle\Entity\User $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \Pixi\CoreBundle\Entity\User
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Message
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Message
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
