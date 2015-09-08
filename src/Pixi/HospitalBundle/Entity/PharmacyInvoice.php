<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/8/15
 * Time: 4:05 PM
 */

namespace Pixi\HospitalBundle\Entity;


use Pixi\CoreBundle\Entity\PixiModel;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;


/**
 * Class PharmacyInvoice
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_pharmacy_invoice")
 */
class PharmacyInvoice extends PixiModel
{
    /**
     * @var
     * @Column(type="string", nullable=true)
     */
    protected $billedTo;
    /**
     * @var
     * @ManyToOne(targetEntity="Patient", inversedBy="pharmacyInvoices")
     */
    protected $patient;
    /**
     * @var
     * @ManyToOne(targetEntity="Doctor")
     */
    protected $doctor;
    /**
     * @var
     * @OneToMany(targetEntity="InventoryItem", mappedBy="pharmacyInvoice")
     */
    protected $inventoryItems;

}