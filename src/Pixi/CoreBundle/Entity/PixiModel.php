<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/22/15
 * Time: 3:34 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class PixiModel
 * @package Pixi\CoreBundle\Entity
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
class PixiModel {
    /**
     * @var
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var
     * @Column(type="datetime")
     */
    protected $created;
    /**
     * @var
     * @Column(type="datetime")
     */
    protected $updated;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @PrePersist
     */
    public function beforeCreate(){
        $this->created = new \DateTime("now");
        $this->updated = new \DateTime("now");
    }

    /**
     * @PreUpdate
     */
    public function beforeUpdate(){

        $this->updated = new \DateTime("now");
    }
}
