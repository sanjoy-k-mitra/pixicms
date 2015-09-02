<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/2/15
 * Time: 5:43 PM
 */

namespace Pixi\LoyaltyManagerBundle\Entity;


use Pixi\CoreBundle\Entity\PixiModel;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;

/**
 * Class Shop
 * @package Pixi\LoyaltyManagerBundle\Entity
 * @Entity
 * @Table(name="llm_shops")
 */
class Shop extends PixiModel
{
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @var
     * @Column(type="string", length=255)
     */
    protected $address;
    /**
     * @var
     * @Column(type="float")
     */
    protected $lat;
    /**
     * @var
     * @Column(type="float")
     */
    protected $lon;


    /**
     * Set name
     *
     * @param string $name
     * @return Shop
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
     * Set address
     *
     * @param string $address
     * @return Shop
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set lat
     *
     * @param float $lat
     * @return Shop
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param float $lon
     * @return Shop
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return float 
     */
    public function getLon()
    {
        return $this->lon;
    }

}
