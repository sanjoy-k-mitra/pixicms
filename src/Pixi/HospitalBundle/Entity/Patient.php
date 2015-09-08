<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/7/15
 * Time: 6:51 PM
 */

namespace Pixi\HospitalBundle\Entity;


use Pixi\CoreBundle\Entity\PixiModel;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class Patient
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_patient")
 */
class Patient extends PixiModel
{
    /**
     * @var
     * @Column(type="string", length=255)
     */
    protected $name;
    /**
     * @var
     * @Column(type="integer")
     */
    protected $age;
    /**
     * @var
     * @ManyToOne(targetEntity="Doctor", inversedBy="patients")
     */
    protected $referral;
    /**
     * @var
     * @OneToMany(targetEntity="PharmacyInvoice", mappedBy="patient")
     */
    protected $pharmacyInvoices;


    /**
     * Set name
     *
     * @param string $name
     * @return Patient
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
     * Set age
     *
     * @param integer $age
     * @return Patient
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set referral
     *
     * @param \Pixi\HospitalBundle\Entity\Doctor $referral
     * @return Patient
     */
    public function setReferral(\Pixi\HospitalBundle\Entity\Doctor $referral = null)
    {
        $this->referral = $referral;

        return $this;
    }

    /**
     * Get referral
     *
     * @return \Pixi\HospitalBundle\Entity\Doctor 
     */
    public function getReferral()
    {
        return $this->referral;
    }
}
