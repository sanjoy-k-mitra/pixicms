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
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class PharmacyItem
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_product")
 */
class Product
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
    /**
     * @var
     * @Column(type="float")
     */
    protected $cost;
    /**
     * @var
     * @ManyToOne(targetEntity="Category", inversedBy="products")
     */
    protected $category;
    /**
     * @var
     * @ManyToOne(targetEntity="Manufacturer", inversedBy="products")
     */
    protected $manufacturer;
    /**
     * @var
     * @OneToMany(targetEntity="InventoryItem", mappedBy="product")
     */
    protected $inventoryItems;


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
     * @return Product
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
     * Set genericName
     *
     * @param string $genericName
     * @return Product
     */
    public function setGenericName($genericName)
    {
        $this->genericName = $genericName;

        return $this;
    }

    /**
     * Get genericName
     *
     * @return string 
     */
    public function getGenericName()
    {
        return $this->genericName;
    }

    /**
     * Set measurement
     *
     * @param string $measurement
     * @return Product
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;

        return $this;
    }

    /**
     * Get measurement
     *
     * @return string 
     */
    public function getMeasurement()
    {
        return $this->measurement;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return Product
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set category
     *
     * @param \Pixi\HospitalBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Pixi\HospitalBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Pixi\HospitalBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set manufacturer
     *
     * @param \Pixi\HospitalBundle\Entity\Manufacturer $manufacturer
     * @return Product
     */
    public function setManufacturer(\Pixi\HospitalBundle\Entity\Manufacturer $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return \Pixi\HospitalBundle\Entity\Manufacturer 
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function getQuantity(){
        $quantity = 0;
        foreach($this->inventoryItems as $ii){
            $quantity += $ii->getQuantity();
        }
        return $quantity;
    }
}
