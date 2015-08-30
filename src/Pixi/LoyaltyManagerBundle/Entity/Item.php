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

/**
 * Class Item
 * @package Pixi\LoyaltyManagerBundle\Entity
 * @Entity
 * @Table(name="items")
 */
class Item
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

}