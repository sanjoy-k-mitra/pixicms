<?php

/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/30/15
 * Time: 8:30 PM
 */
namespace Pixi\LoyaltyManagerBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Pixi\CoreBundle\Entity\PixiModel;

/**
 * Class Offer
 * @package Pixi\LoyaltyManagerBundle\Entity
 * @Entity
 * @Table(name="offers")
 */
class Offer extends PixiModel
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
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @var
     * @Column(type="text", nullable=true)
     */
    protected $description;
    /**
     * @var
     * @Column(type="integer")
     */
    protected $point;

}
