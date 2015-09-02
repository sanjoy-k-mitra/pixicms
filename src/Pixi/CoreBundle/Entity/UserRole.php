<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 6/26/15
 * Time: 4:59 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToMany;

use Pixi\CoreBundle\Entity\Permission;

/**
 * Class UserRole
 * @package Pixi\CoreBundle\Entity
 * @Entity
 * @Table(name="user_roles")
 */
class UserRole extends PixiModel{
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @ManyToMany(targetEntity="Permission")
     */
    protected $permissions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permissions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return UserRole
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
     * Add permission
     *
     * @param \Pixi\CoreBundle\Entity\Permission $permission
     *
     * @return UserRole
     */
    public function addPermission(\Pixi\CoreBundle\Entity\Permission $permission)
    {
        $this->permissions[] = $permission;

        return $this;
    }

    /**
     * Remove permission
     *
     * @param \Pixi\CoreBundle\Entity\Permission $permission
     */
    public function removePermission(\Pixi\CoreBundle\Entity\Permission $permission)
    {
        $this->permissions->removeElement($permission);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

}
