<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 6/26/15
 * Time: 5:12 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Class User
 * @package Pixi\CoreBundle\Entity
 * @Entity
 * @Table(name="users")
 */
class User {
    /**
     * @var
     * @Id @Column(type="integer") @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $username;
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $password;
    /**
     * @var
     * @Column(type="string", length=100)
     */
    protected $name;
    /**
     * @OneToOne(targetEntity="Role")
     */
    protected $role;


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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set role
     *
     * @param \Pixi\CoreBundle\Entity\Role $role
     * @return User
     */
    public function setRole(\Pixi\CoreBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Pixi\CoreBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
}
