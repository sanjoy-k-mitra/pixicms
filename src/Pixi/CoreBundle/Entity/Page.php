<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/11/15
 * Time: 7:37 PM
 */

namespace Pixi\CoreBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * Class Page
 * @package Pixi\CoreBundle\Entity
 * @Entity
 * @Table(name="pages")
 */
class Page extends Article
{
    /**
     * @var
     * @ManyToMany(targetEntity="ResourceFile")
     * @JoinTable(name="page_js_resource")
     */
    protected $jsResources;
    /**
     * @var
     * @ManyToMany(targetEntity="ResourceFile")
     * @JoinTable(name="page_css_resource")
     */
    protected $cssResources;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jsResources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cssResources = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     *
     * @return Page
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
     * @return Page
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
     * @return Page
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
     * @return Page
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

    /**
     * Add jsResource
     *
     * @param \Pixi\CoreBundle\Entity\ResourceFile $jsResource
     *
     * @return Page
     */
    public function addJsResource(\Pixi\CoreBundle\Entity\ResourceFile $jsResource)
    {
        $this->jsResources[] = $jsResource;

        return $this;
    }

    /**
     * Remove jsResource
     *
     * @param \Pixi\CoreBundle\Entity\ResourceFile $jsResource
     */
    public function removeJsResource(\Pixi\CoreBundle\Entity\ResourceFile $jsResource)
    {
        $this->jsResources->removeElement($jsResource);
    }

    /**
     * Get jsResources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJsResources()
    {
        return $this->jsResources;
    }

    /**
     * Add cssResource
     *
     * @param \Pixi\CoreBundle\Entity\ResourceFile $cssResource
     *
     * @return Page
     */
    public function addCssResource(\Pixi\CoreBundle\Entity\ResourceFile $cssResource)
    {
        $this->cssResources[] = $cssResource;

        return $this;
    }

    /**
     * Remove cssResource
     *
     * @param \Pixi\CoreBundle\Entity\ResourceFile $cssResource
     */
    public function removeCssResource(\Pixi\CoreBundle\Entity\ResourceFile $cssResource)
    {
        $this->cssResources->removeElement($cssResource);
    }

    /**
     * Get cssResources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCssResources()
    {
        return $this->cssResources;
    }
}
