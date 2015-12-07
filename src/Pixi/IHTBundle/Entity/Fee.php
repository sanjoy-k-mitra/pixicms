<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 12/7/15
 * Time: 4:31 PM
 */

namespace Pixi\IHTBundle\Entity;


use Pixi\CoreBundle\Entity\PixiModel;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;


/**
 * Class Fee
 * @package Pixi\IHTBundle\Entity
 * @Entity
 * @Table(name="fees")
 */
class Fee extends PixiModel
{
    /**
     * @var
     * @Column(type="string")
     */
    protected $name;
    /**
     * @var
     * @ManyToOne(targetEntity="Account")
     */
    protected $account;
    /**
     * @var
     * @Column(type="boolean")
     */
    protected $isApplicable;
    /**
     * @var
     * @Column(type="float")
     */
    protected $amount;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getIsApplicable()
    {
        return $this->isApplicable;
    }

    /**
     * @param mixed $isApplicable
     */
    public function setIsApplicable($isApplicable)
    {
        $this->isApplicable = $isApplicable;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }



}