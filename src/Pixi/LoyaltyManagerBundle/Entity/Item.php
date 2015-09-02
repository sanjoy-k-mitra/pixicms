<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/31/15
 * Time: 3:13 AM
 */

namespace Pixi\LoyaltyManagerBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Pixi\CoreBundle\Entity\PixiModel;

/**
 * Class Item
 * @package Pixi\LoyaltyManagerBundle\Entity
 * @Entity
 * @Table(name="llm_items")
 */
class Item extends PixiModel
{
    /**
     * @var
     * @Column(type="string")
     */
    protected $name;
    /**
     * @var
     * @Column(type="string", length=255)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $code;
    /**
     * @var
     * @Column(type="integer")
     */
    protected $point;

    /**
     * Set name
     *
     * @param string $name
     * @return Item
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
     * Set code
     *
     * @param string $code
     * @return Item
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set point
     *
     * @param integer $point
     * @return Item
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return integer 
     */
    public function getPoint()
    {
        return $this->point;
    }
}
