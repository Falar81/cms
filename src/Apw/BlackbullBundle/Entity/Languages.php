<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Languages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\LanguagesRepository")
 */
class Languages
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
     * @ORM\Column(name="name", type="string", length=32, nullable = true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable = true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=64, nullable = true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=32, nullable = true)
     */
    private $directory;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable = true)
     */
    private $sortOrder;

    /**
     * @ORM\OneToMany(targetEntity="ProductsDescription", mappedBy="languages")
     */
    private $productsDescription;

    /**
     * @ORM\OneToMany(targetEntity="CategoriesDescription", mappedBy="languages")
     */
    private $categoriesDescription;

    /**
     * @ORM\OneToMany(targetEntity="ManufacturersInfo", mappedBy="languages")
     */
    private $manufacturersInfo;


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
     * @return Languages
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
     * Set code
     *
     * @param string $code
     * @return Languages
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Languages
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
     * Set directory
     *
     * @param string $directory
     * @return Languages
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string 
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Languages
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
     * Constructor
     */
    public function __construct()
    {
        $this->productsDescription = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categoriesDescription = new \Doctrine\Common\Collections\ArrayCollection();
        $this->manufacturersDescription = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add productsDescription
     *
     * @param \Apw\BlackbullBundle\Entity\ProductsDescription $productsDescription
     * @return Languages
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

    /**
     * Add categoriesDescription
     *
     * @param \Apw\BlackbullBundle\Entity\CategoriesDescription $categoriesDescription
     * @return Languages
     */
    public function addCategoriesDescription(\Apw\BlackbullBundle\Entity\CategoriesDescription $categoriesDescription)
    {
        $this->categoriesDescription[] = $categoriesDescription;

        return $this;
    }

    /**
     * Remove categoriesDescription
     *
     * @param \Apw\BlackbullBundle\Entity\CategoriesDescription $categoriesDescription
     */
    public function removeCategoriesDescription(\Apw\BlackbullBundle\Entity\CategoriesDescription $categoriesDescription)
    {
        $this->categoriesDescription->removeElement($categoriesDescription);
    }

    /**
     * Get categoriesDescription
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoriesDescription()
    {
        return $this->categoriesDescription;
    }



    /**
     * Add manufacturersInfo
     *
     * @param \Apw\BlackbullBundle\Entity\ManufacturersInfo $manufacturersInfo
     * @return Languages
     */
    public function addManufacturersInfo(\Apw\BlackbullBundle\Entity\ManufacturersInfo $manufacturersInfo)
    {
        $this->manufacturersInfo[] = $manufacturersInfo;

        return $this;
    }

    /**
     * Remove manufacturersInfo
     *
     * @param \Apw\BlackbullBundle\Entity\ManufacturersInfo $manufacturersInfo
     */
    public function removeManufacturersInfo(\Apw\BlackbullBundle\Entity\ManufacturersInfo $manufacturersInfo)
    {
        $this->manufacturersInfo->removeElement($manufacturersInfo);
    }

    /**
     * Get manufacturersInfo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManufacturersInfo()
    {
        return $this->manufacturersInfo;
    }
}
