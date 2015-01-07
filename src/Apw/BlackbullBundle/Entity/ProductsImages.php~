<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\ProductsImagesRepository")
 */
class ProductsImages
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
     * @ORM\Column(name="image", type="string", length=64, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="htmlcontent", type="text", nullable=true)
     */
    private $htmlcontent;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;


    /**
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="productsImages")
     * @ORM\JoinColumn(name="products_id", referencedColumnName="id")
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
     * Set image
     *
     * @param string $image
     * @return ProductsImages
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set htmlcontent
     *
     * @param string $htmlcontent
     * @return ProductsImages
     */
    public function setHtmlcontent($htmlcontent)
    {
        $this->htmlcontent = $htmlcontent;

        return $this;
    }

    /**
     * Get htmlcontent
     *
     * @return string 
     */
    public function getHtmlcontent()
    {
        return $this->htmlcontent;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return ProductsImages
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set products
     *
     * @param \Apw\BlackbullBundle\Entity\Products $products
     * @return ProductsImages
     */
    public function setProducts(\Apw\BlackbullBundle\Entity\Products $products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \Apw\BlackbullBundle\Entity\Products 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
