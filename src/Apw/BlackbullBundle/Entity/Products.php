<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\ProductsRepository")
 * @ORM\HasLifecycleCallbacks()
 */

class Products
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
     * @var integer
     *
     * @ORM\Column(name="products_quantity", type="integer", nullable = true)
     */
    private $productsQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="products_model", type="string", length=12, nullable = true)
     */
    private $productsModel;

    /**
     * @var string
     *
     * @ORM\Column(name="products_image", type="string", length=64, nullable = true)
     */
    private $productsImage;

    /**
     * @var string
     *
     * @ORM\Column(name="products_price", type="decimal", nullable = true)
     */
    private $productsPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="products_date_added", type="datetime", nullable = true)
     */
    private $productsDateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="products_last_modified", type="datetime", nullable = true)
     */
    private $productsLastModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="products_date_available", type="datetime", nullable = true)
     */
    private $productsDateAvailable;

    /**
     * @var string
     *
     * @ORM\Column(name="products_weight", type="decimal", nullable = true)
     */
    private $productsWeight;

    /**
     * @var boolean
     *
     * @ORM\Column(name="products_status", type="boolean", nullable = true)
     */
    private $productsStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_ordered", type="integer", nullable = true)
     */
    private $productsOrdered;

    /**
     * @ORM\OneToMany(targetEntity="ProductsDescription", mappedBy="product", cascade={"persist", "remove"})
     */
    private $productsDescription;

    /**
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="products")
     * @ORM\JoinTable(name="productstocategories")
     */
    private $categories;

    /**
     * @ORM\OneToOne(targetEntity="Manufacturers", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturers_id", referencedColumnName="id")
     **/
    private $manufacturers;

    /**
     * @ORM\OneToMany(targetEntity="ProductsImages", mappedBy="products")
     */
    private $productsImages;


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
     * Set productsQuantity
     *
     * @param integer $productsQuantity
     * @return Products
     */
    public function setProductsQuantity($productsQuantity)
    {
        $this->productsQuantity = $productsQuantity;

        return $this;
    }

    /**
     * Get productsQuantity
     *
     * @return integer 
     */
    public function getProductsQuantity()
    {
        return $this->productsQuantity;
    }

    /**
     * Set productsModel
     *
     * @param string $productsModel
     * @return Products
     */
    public function setProductsModel($productsModel)
    {
        $this->productsModel = $productsModel;

        return $this;
    }

    /**
     * Get productsModel
     *
     * @return string 
     */
    public function getProductsModel()
    {
        return $this->productsModel;
    }

    /**
     * Set productsImage
     *
     * @param string $productsImage
     * @return Products
     */
    public function setProductsImage($productsImage)
    {
        $this->productsImage = $productsImage;

        return $this;
    }

    /**
     * Get productsImage
     *
     * @return string 
     */
    public function getProductsImage()
    {
        return $this->productsImage;
    }

    /**
     * Set productsPrice
     *
     * @param string $productsPrice
     * @return Products
     */
    public function setProductsPrice($productsPrice)
    {
        $this->productsPrice = $productsPrice;

        return $this;
    }

    /**
     * Get productsPrice
     *
     * @return string 
     */
    public function getProductsPrice()
    {
        return $this->productsPrice;
    }

    /**
     * Set productsDateAdded
     *
     * @param \DateTime $productsDateAdded
     * @return Products
     */
    public function setProductsDateAdded($productsDateAdded)
    {
        $this->productsDateAdded = $productsDateAdded;

        return $this;
    }

    /**
     * Get productsDateAdded
     *
     * @return \DateTime 
     */
    public function getProductsDateAdded()
    {
        return $this->productsDateAdded;
    }

    /**
     * Set productsLastModified
     *
     * @param \DateTime $productsLastModified
     * @return Products
     */
    public function setProductsLastModified($productsLastModified)
    {
        $this->productsLastModified = $productsLastModified;

        return $this;
    }

    /**
     * Get productsLastModified
     *
     * @return \DateTime 
     */
    public function getProductsLastModified()
    {
        return $this->productsLastModified;
    }

    /**
     * Set productsDateAvailable
     *
     * @param \DateTime $productsDateAvailable
     * @return Products
     */
    public function setProductsDateAvailable($productsDateAvailable)
    {
        $this->productsDateAvailable = $productsDateAvailable;

        return $this;
    }

    /**
     * Get productsDateAvailable
     *
     * @return \DateTime 
     */
    public function getProductsDateAvailable()
    {
        return $this->productsDateAvailable;
    }

    /**
     * Set productsWeight
     *
     * @param string $productsWeight
     * @return Products
     */
    public function setProductsWeight($productsWeight)
    {
        $this->productsWeight = $productsWeight;

        return $this;
    }

    /**
     * Get productsWeight
     *
     * @return string 
     */
    public function getProductsWeight()
    {
        return $this->productsWeight;
    }

    /**
     * Set productsStatus
     *
     * @param boolean $productsStatus
     * @return Products
     */
    public function setProductsStatus($productsStatus)
    {
        $this->productsStatus = $productsStatus;

        return $this;
    }

    /**
     * Get productsStatus
     *
     * @return boolean 
     */
    public function getProductsStatus()
    {
        return $this->productsStatus;
    }

    /**
     * Set productsOrdered
     *
     * @param integer $productsOrdered
     * @return Products
     */
    public function setProductsOrdered($productsOrdered)
    {
        $this->productsOrdered = $productsOrdered;

        return $this;
    }

    /**
     * Get productsOrdered
     *
     * @return integer 
     */
    public function getProductsOrdered()
    {
        return $this->productsOrdered;
    }


    /**
     * Set manufacturers
     *
     * @param \Apw\BlackbullBundle\Entity\Manufacturers $manufacturers
     * @return Products
     */
    public function setManufacturers(\Apw\BlackbullBundle\Entity\Manufacturers $manufacturers = null)
    {
        $this->manufacturers = $manufacturers;

        return $this;
    }

    /**
     * Get manufacturers
     *
     * @return \Apw\BlackbullBundle\Entity\Manufacturers 
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $date = new \DateTime();
        $this->productsDateAdded = new \DateTime($date->format('d-m-Y H:i:s'));
    }

    /**
     * Add productsImages
     *
     * @param \Apw\BlackbullBundle\Entity\ProductsImages $productsImages
     * @return Products
     */
    public function addProductsImage(\Apw\BlackbullBundle\Entity\ProductsImages $productsImages)
    {
        $this->productsImages[] = $productsImages;

        return $this;
    }

    /**
     * Remove productsImages
     *
     * @param \Apw\BlackbullBundle\Entity\ProductsImages $productsImages
     */
    public function removeProductsImage(\Apw\BlackbullBundle\Entity\ProductsImages $productsImages)
    {
        $this->productsImages->removeElement($productsImages);
    }

    /**
     * Get productsImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductsImages()
    {
        return $this->productsImages;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productsImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productsDescription = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categories
     *
     * @param \Apw\BlackbullBundle\Entity\Categories $categories
     * @return Products
     */
    public function addCategory(\Apw\BlackbullBundle\Entity\Categories $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Apw\BlackbullBundle\Entity\Categories $categories
     */
    public function removeCategory(\Apw\BlackbullBundle\Entity\Categories $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add productsDescription
     *
     * @param \Apw\BlackbullBundle\Entity\ProductsDescription $productsDescription
     * @return Products
     */
    public function addProductsDescription(\Apw\BlackbullBundle\Entity\ProductsDescription $productsDescription)
    {
        $this->productsDescription[] = $productsDescription;

        return $this;
    }

    /**
     * Remove productsDescription
     *
     * @param \Apw\BlackbullBundle\Entity\ProductsDescription $productsDescription
     */
    public function removeProductsDescription(\Apw\BlackbullBundle\Entity\ProductsDescription $productsDescription)
    {
        $this->productsDescription->removeElement($productsDescription);
    }

    /**
     * Get productsDescription
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductsDescription()
    {
        return $this->productsDescription;
    }
}
