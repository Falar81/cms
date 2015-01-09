<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsDescription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\ProductsDescriptionRepository")
 */
class ProductsDescription
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
     * @ORM\Column(name="products_name", type="string", length=64, nullable = true)
     */
    private $productsName;

    /**
     * @var string
     *
     * @ORM\Column(name="products_description", type="text", nullable = true)
     */
    private $productsDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="products_url", type="string", length=255, nullable = true)
     */
    private $productsUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_viewed", type="integer", length=5, nullable = true)
     */
    private $products_viewed;

    /**
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="productsDescription")
     **/
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Languages", inversedBy="productsDescription")
     * @ORM\JoinColumn(name="languages_id", referencedColumnName="id")
     **/
    private $languages;

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
     * Set productsName
     *
     * @param string $productsName
     * @return ProductsDescription
     */
    public function setProductsName($productsName)
    {
        $this->productsName = $productsName;

        return $this;
    }

    /**
     * Get productsName
     *
     * @return string 
     */
    public function getProductsName()
    {
        return $this->productsName;
    }

    /**
     * Set productsDescription
     *
     * @param string $productsDescription
     * @return ProductsDescription
     */
    public function setProductsDescription($productsDescription)
    {
        $this->productsDescription = $productsDescription;

        return $this;
    }

    /**
     * Get productsDescription
     *
     * @return string 
     */
    public function getProductsDescription()
    {
        return $this->productsDescription;
    }

    /**
     * Set productsUrl
     *
     * @param string $productsUrl
     * @return ProductsDescription
     */
    public function setProductsUrl($productsUrl)
    {
        $this->productsUrl = $productsUrl;

        return $this;
    }

    /**
     * Get productsUrl
     *
     * @return string 
     */
    public function getProductsUrl()
    {
        return $this->productsUrl;
    }

    /**
     * Set products_viewed
     *
     * @param integer $productsViewed
     * @return ProductsDescription
     */
    public function setProductsViewed($productsViewed)
    {
        $this->products_viewed = $productsViewed;

        return $this;
    }

    /**
     * Get products_viewed
     *
     * @return integer 
     */
    public function getProductsViewed()
    {
        return $this->products_viewed;
    }

    /**
     * Set languages
     *
     * @param \Apw\BlackbullBundle\Entity\Languages $languages
     * @return ProductsDescription
     */
    public function setLanguages(\Apw\BlackbullBundle\Entity\Languages $languages = null)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return \Apw\BlackbullBundle\Entity\Languages 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set product
     *
     * @param \Apw\BlackbullBundle\Entity\Products $product
     * @return ProductsDescription
     */
    public function setProduct(\Apw\BlackbullBundle\Entity\Products $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Apw\BlackbullBundle\Entity\Products 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
