<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/7/15
 * Time: 6:49 PM
 */

namespace Pixi\HospitalBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class Doctor
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_doctor")
 */
class Doctor
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
     * @Column(type="string", length=255)
     */
    protected $name;
    /**
     * @var
     * @Column(type="string", length=100, nullable=true)
     */
    protected $department;
    /**
     * @var
     * @Column(type="float")
     */
    protected $apointmentFee;
    /**
     * @var
     * @OneToMany(targetEntity="Patient", mappedBy="referral")
     */
    protected $patients;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patients = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Doctor
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
     * Set department
     *
     * @param string $department
     * @return Doctor
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set apointmentFee
     *
     * @param float $apointmentFee
     * @return Doctor
     */
    public function setApointmentFee($apointmentFee)
    {
        $this->apointmentFee = $apointmentFee;

        return $this;
    }

    /**
     * Get apointmentFee
     *
     * @return float 
     */
    public function getApointmentFee()
    {
        return $this->apointmentFee;
    }

    /**
     * Add patients
     *
     * @param \Pixi\HospitalBundle\Entity\Patient $patients
     * @return Doctor
     */
    public function addPatient(\Pixi\HospitalBundle\Entity\Patient $patients)
    {
        $this->patients[] = $patients;

        return $this;
    }

    /**
     * Remove patients
     *
     * @param \Pixi\HospitalBundle\Entity\Patient $patients
     */
    public function removePatient(\Pixi\HospitalBundle\Entity\Patient $patients)
    {
        $this->patients->removeElement($patients);
    }

    /**
     * Get patients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPatients()
    {
        return $this->patients;
    }
}
