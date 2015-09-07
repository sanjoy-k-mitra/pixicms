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

}