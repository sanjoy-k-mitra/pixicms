<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 12/7/15
 * Time: 4:41 PM
 */

namespace Pixi\IHTBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Pixi\CoreBundle\Entity\PixiModel;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class Payment
 * @package Pixi\IHTBundle\Entity
 * @Entity
 * @Table(name="payments")
 */
class Payment extends PixiModel
{
    /**
     * @var
     * @Column(type="string")
     */
    protected $registrationNo;
    /**
     * @var
     * @OneToMany(targetEntity="PaymentEntry", mappedBy="payment")
     */
    protected $paymentEntries;
    /**
     * @var
     * @Column(type="string")
     */
    protected $comment;

    public function __construct()
    {
        $this->paymentEntries == new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getRegistrationNo()
    {
        return $this->registrationNo;
    }

    /**
     * @param mixed $registrationNo
     */
    public function setRegistrationNo($registrationNo)
    {
        $this->registrationNo = $registrationNo;
    }

    /**
     * @return mixed
     */
    public function getPaymentEntries()
    {
        return $this->paymentEntries;
    }

    /**
     * @param mixed $paymentEntries
     */
    public function setPaymentEntries($paymentEntries)
    {
        $this->paymentEntries = $paymentEntries;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }


}