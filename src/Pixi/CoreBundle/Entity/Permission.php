<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 6/26/15
 * Time: 5:05 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * Class Role
 * @package PixiCoreBundle\Entity
 * @Entity
 * @Table(name="permissions")
 */
class Permission extends PixiModel{
    /**
     * @var
     * @Column(name="permission_key", type="string", length=100, unique=true)
     */
    protected $key;
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @var
     * @Column(type="string", length=255, nullable=true)
     */
    protected $description;



    /**
     * Set key
     *
     * @param string $key
     *
     * @return Permission
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Permission
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
     * Set description
     *
     * @param string $description
     *
     * @return Permission
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
