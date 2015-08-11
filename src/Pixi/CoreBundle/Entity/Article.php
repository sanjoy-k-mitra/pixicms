<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/11/15
 * Time: 7:33 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;

/**
 * Class Article
 * @package Pixi\CoreBundle\Entity
 * @Entity
 * @Table(name="articles")
 */
class Article extends PixiModel
{
    /**
     * @var
     * @Column(type="string", length=255, unique=true)
     */
    protected $identifier;
    /**
     * @var
     * @Column(type="string", length=255)
     */
    protected $title;
    /**
     * @var
     * @Column(type="text")
     */
    protected $content;
    /**
     * @var
     * @Column(type="boolean")
     */
    protected $isPublished;


    /**
     * Set identifier
     *
     * @param string $identifier
     *
     * @return Article
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     *
     * @return Article
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }
}
