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
class Permission {
    /**
     * @var
     * @Id @Column(type="integer") @GeneratedValue(strategy="AUTO")
     */
    protected $id;
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
     * @ManyToMany(targetEntity="UserRole", mappedBy="permissions")
     *
     */
    protected $userRoles;
    /**
     * @var
     * @Column(type="string", length=255, nullable=true)
     */
    protected $description;

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userRole
     *
     * @param \Pixi\CoreBundle\Entity\UserRole $userRole
     *
     * @return Permission
     */
    public function addUserRole(\Pixi\CoreBundle\Entity\UserRole $userRole)
    {
        $this->userRoles[] = $userRole;

        return $this;
    }

    /**
     * Remove userRole
     *
     * @param \Pixi\CoreBundle\Entity\UserRole $userRole
     */
    public function removeUserRole(\Pixi\CoreBundle\Entity\UserRole $userRole)
    {
        $this->userRoles->removeElement($userRole);
    }

    /**
     * Get userRoles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
}
