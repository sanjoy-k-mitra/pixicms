<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/8/15
 * Time: 2:15 PM
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
 * Class InventoryItem
 * @package Pixi\HospitalBundle\Entity
 * @Entity
 * @Table(name="hms_inventory_item")
 */
class InventoryItem
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
     * @ManyToOne(targetEntity="Product", inversedBy="inventoryItems")
     */
    protected $product;
    /**
     * @var
     * @Column(type="integer")
     */
    protected $quantity;
    /**
     * @var
     * @ManyToOne(targetEntity="PharmacyInvoice", inversedBy="inventoryItems")
     */
    protected $pharmacyInvoice;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


}