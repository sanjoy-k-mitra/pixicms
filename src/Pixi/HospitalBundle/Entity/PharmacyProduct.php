<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/7/15
 * Time: 6:52 PM
 */

namespace Pixi\HospitalBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * Class PharmacyItem
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_product")
 */
class PharmacyProduct
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
     * @Column(type="string", length=255, nullable=true)
     */
    protected $genericName;
    /**
     * @var
     * @Column(type="string", length=255, nullable=true)
     */
    protected $measurement;
    /**
     * @var
     * @Column(type="float")
     */
    protected $price;
}