<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\CategoriesRepository")
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categories_image", type="string", length=64, nullable = true)
     */
    private $categoriesImage;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable = true, options={"default":0})
     */
    private $parentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable = true, options={"default":0})
     */
    private $sortOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable = true)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable = true)
     */
    private $lastModified;

    /**
     * @ORM\OneToMany(targetEntity="CategoriesDescription", mappedBy="category", cascade={"persist", "remove"})
     */
    private $categoryDescription;

    /**
     * @ORM\ManyToMany(targetEntity="Products", mappedBy="categories")
     **/
    private $products;

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
     * Set categoriesImage
     *
     * @param string $categoriesImage
     * @return Categories
     */
    public function setCategoriesImage($categoriesImage)
    {
        $this->categoriesImage = $categoriesImage;

        return $this;
    }

    /**
     * Get categoriesImage
     *
     * @return string 
     */
    public function getCategoriesImage()
    {
        return $this->categoriesImage;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Categories
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set sortOrder
     *
     * @param string $sortOrder
     * @return Categories
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return string 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Categories
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Categories
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryDescription = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    /**
     * Add categoryDescription
     *
     * @param \Apw\BlackbullBundle\Entity\CategoriesDescription $categoryDescription
     * @return Categories
     */
    public function addCategoryDescription(\Apw\BlackbullBundle\Entity\CategoriesDescription $categoryDescription)
    {
        $this->categoryDescription[] = $categoryDescription;

        return $this;
    }

    /**
     * Remove categoryDescription
     *
     * @param \Apw\BlackbullBundle\Entity\CategoriesDescription $categoryDescription
     */
    public function removeCategoryDescription(\Apw\BlackbullBundle\Entity\CategoriesDescription $categoryDescription)
    {
        $this->categoryDescription->removeElement($categoryDescription);
    }

    /**
     * Get categoryDescription
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }

    /**
     * Add products
     *
     * @param \Apw\BlackbullBundle\Entity\Products $products
     * @return Categories
     */
    public function addProduct(\Apw\BlackbullBundle\Entity\Products $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Apw\BlackbullBundle\Entity\Products $products
     */
    public function removeProduct(\Apw\BlackbullBundle\Entity\Products $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
