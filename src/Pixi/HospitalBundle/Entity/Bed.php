<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/7/15
 * Time: 6:53 PM
 */

namespace Pixi\HospitalBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

/**
 * Class Bed
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_bed")
 */
class Bed
{
    /**
     * @var
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @var
     * @Column(type="string", length=100, nullable=true)
     */
    protected $ward;
    /**
     * @var
     * @Column(type="float")
     */
    protected $dailyCost;

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
     * Set name
     *
     * @param string $name
     * @return Bed
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ward
     *
     * @param string $ward
     * @return Bed
     */
    public function setWard($ward)
    {
        $this->ward = $ward;

        return $this;
    }

    /**
     * Get ward
     *
     * @return string 
     */
    public function getWard()
    {
        return $this->ward;
    }

    /**
     * Set dailyCost
     *
     * @param float $dailyCost
     * @return Bed
     */
    public function setDailyCost($dailyCost)
    {
        $this->dailyCost = $dailyCost;

        return $this;
    }

    /**
     * Get dailyCost
     *
     * @return float 
     */
    public function getDailyCost()
    {
        return $this->dailyCost;
    }
}