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
     * @OneToMany(targetEntity="InventoryItem", mappedBy="pharmacyInvoice", cascade={"all"})
     */
    protected $inventoryItems;
    /**
     * @var
     * @Column(type="boolean")
     */
    protected $percentageDiscount;
    /**
     * @var
     * @Column(type="float")
     */
    protected $discount;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inventoryItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set billedTo
     *
     * @param string $billedTo
     * @return PharmacyInvoice
     */
    public function setBilledTo($billedTo)
    {
        $this->billedTo = $billedTo;

        return $this;
    }

    /**
     * Get billedTo
     *
     * @return string 
     */
    public function getBilledTo()
    {
        return $this->billedTo;
    }

    /**
     * Set patient
     *
     * @param \Pixi\HospitalBundle\Entity\Patient $patient
     * @return PharmacyInvoice
     */
    public function setPatient(\Pixi\HospitalBundle\Entity\Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \Pixi\HospitalBundle\Entity\Patient 
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set doctor
     *
     * @param \Pixi\HospitalBundle\Entity\Doctor $doctor
     * @return PharmacyInvoice
     */
    public function setDoctor(\Pixi\HospitalBundle\Entity\Doctor $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return \Pixi\HospitalBundle\Entity\Doctor 
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Add inventoryItems
     *
     * @param \Pixi\HospitalBundle\Entity\InventoryItem $inventoryItems
     * @return PharmacyInvoice
     */
    public function addInventoryItem(\Pixi\HospitalBundle\Entity\InventoryItem $inventoryItems)
    {
        $this->inventoryItems[] = $inventoryItems;

        return $this;
    }

    /**
     * Remove inventoryItems
     *
     * @param \Pixi\HospitalBundle\Entity\InventoryItem $inventoryItems
     */
    public function removeInventoryItem(\Pixi\HospitalBundle\Entity\InventoryItem $inventoryItems)
    {
        $this->inventoryItems->removeElement($inventoryItems);
    }

    /**
     * Get inventoryItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInventoryItems()
    {
        return $this->inventoryItems;
    }

    public function getSubTotal(){
        $total = 0;
        foreach ($this->inventoryItems as $ii) {
            $total += $ii->getProduct()->getPrice() * $ii->getQuantity();
        }
        return $total;
    }

    public function getTotal(){
        if(!is_null($this->percentageDiscount) && $this->percentageDiscount) {
            return $this->getSubTotal() * (1 - $this->discount / 100);
        }else{
            return $this->getSubTotal() - $this->discount;
        }
    }

    /**
     * Set percentageDiscount
     *
     * @param boolean $percentageDiscount
     * @return PharmacyInvoice
     */
    public function setPercentageDiscount($percentageDiscount)
    {
        $this->percentageDiscount = $percentageDiscount;

        return $this;
    }

    /**
     * Get percentageDiscount
     *
     * @return boolean 
     */
    public function getPercentageDiscount()
    {
        return $this->percentageDiscount;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return PharmacyInvoice
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
