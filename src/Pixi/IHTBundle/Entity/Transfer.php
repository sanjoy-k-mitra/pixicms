<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 12/7/15
 * Time: 5:01 PM
 */

namespace Pixi\IHTBundle\Entity;
use Pixi\CoreBundle\Entity\PixiModel;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Column;

/**
 * Class Transfer
 * @package Pixi\IHTBundle\Entity
 * @Entity
 * @Table(name="transfers")
 */
class Transfer extends PixiModel
{
    /**
     * @var
     * @ManyToOne(targetEntity="Account")
     */
    protected $from;
    /**
     * @var
     * @ManyToOne(targetEntity="Account")
     */
    protected $to;
    /**
     * @var
     * @Column(type="float")
     */
    protected $amount;
    /**
     * @var
     * @Column(type="string")
     */
    protected $note;

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
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

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }



}