<?php

/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 12/7/15
 * Time: 1:31 PM
 */
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
/**
 * Class Account
 * @Entity
 * @Table(name="accounts")
 */
class Account extends \Pixi\CoreBundle\Entity\PixiModel
{

    /**
     * @var
     * @Column(type="string", length=255)
     */
    protected $name;
    /**
     * @var
     * @Column(type="Boolean")
     */
    protected $isActive;
    /**
     * @var
     * @Column(type="text")
     */
    protected $description;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}