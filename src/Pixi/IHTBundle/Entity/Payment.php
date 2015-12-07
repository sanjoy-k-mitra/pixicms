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
     * Add paymentEntry
     *
     * @param \Pixi\IHTBundle\Entity\PaymentEntry $paymentEntry
     *
     * @return Payment
     */
    public function addPaymentEntry(\Pixi\IHTBundle\Entity\PaymentEntry $paymentEntry)
    {
        $this->paymentEntries[] = $paymentEntry;
        return $this;
    }

    /**
     * Remove paymentEntry
     *
     * @param \Pixi\IHTBundle\Entity\PaymentEntry $paymentEntry
     */
    public function removePermission(\Pixi\IHTBundle\Entity\PaymentEntry $paymentEntry)
    {
        $this->paymentEntries->removeElement($paymentEntry);
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

    public function getAmount(){
        $amount = 0;
        foreach($this->paymentEntries as $entry){
            $amount += $entry->getAmount();
        }
        return $amount;
    }


}