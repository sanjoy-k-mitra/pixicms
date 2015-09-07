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
     * @OneToMany(targetEntity="Patient")
     */
    protected $patients;

}