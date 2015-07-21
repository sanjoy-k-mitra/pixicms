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
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\OneToMany;

use Pixi\CoreBundle\Entity\Permission;

/**
 * Class UserRole
 * @package Pixi\CoreBundle\Entity
 * @Entity
 * @Table(name="user_roles")
 */
class UserRole {
    /**
     * @var
     * @Id @Column(type="integer") @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @ManyToMany(targetEntity="Permission", inversedBy="userRoles")
     */
    protected $permissions;
    /**
     * @OneToMany(targetEntity="User", mappedBy="userRole")
     */
    protected $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permissions = new ArrayCollection();
    }

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

    /**
     * Add user
     *
     * @param \Pixi\CoreBundle\Entity\User $user
     *
     * @return UserRole
     */
    public function addUser(\Pixi\CoreBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Pixi\CoreBundle\Entity\User $user
     */
    public function removeUser(\Pixi\CoreBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
