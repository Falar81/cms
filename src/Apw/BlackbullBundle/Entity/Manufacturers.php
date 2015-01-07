<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manufacturers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\ManufacturersRepository")
 */
class Manufacturers
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
     * @ORM\Column(name="manufacturers_name", type="string", length=32, nullable=true)
     */
    private $manufacturersName;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturers_image", type="string", length=64, nullable=true)
     */
    private $manufacturersImage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=true)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;

    /**
     * @ORM\OneToOne(targetEntity="Products", mappedBy="manufacturers")
     */
    private $products;

    /**
     * @ORM\OneToOne(targetEntity="ManufacturersInfo", mappedBy="manufacturers")
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
     * Set manufacturersName
     *
     * @param string $manufacturersName
     * @return Manufacturers
     */
    public function setManufacturersName($manufacturersName)
    {
        $this->manufacturersName = $manufacturersName;

        return $this;
    }

    /**
     * Get manufacturersName
     *
     * @return string 
     */
    public function getManufacturersName()
    {
        return $this->manufacturersName;
    }

    /**
     * Set manufacturersImage
     *
     * @param string $manufacturersImage
     * @return Manufacturers
     */
    public function setManufacturersImage($manufacturersImage)
    {
        $this->manufacturersImage = $manufacturersImage;

        return $this;
    }

    /**
     * Get manufacturersImage
     *
     * @return string 
     */
    public function getManufacturersImage()
    {
        return $this->manufacturersImage;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Manufacturers
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
     * @return Manufacturers
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
     * Set products
     *
     * @param \Apw\BlackbullBundle\Entity\Products $products
     * @return Manufacturers
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

    /**
     * Set manufacturersInfo
     *
     * @param \Apw\BlackbullBundle\Entity\ManufacturersInfo $manufacturersInfo
     * @return Manufacturers
     */
    public function setManufacturersInfo(\Apw\BlackbullBundle\Entity\ManufacturersInfo $manufacturersInfo = null)
    {
        $this->manufacturersInfo = $manufacturersInfo;

        return $this;
    }

    /**
     * Get manufacturersInfo
     *
     * @return \Apw\BlackbullBundle\Entity\ManufacturersInfo 
     */
    public function getManufacturersInfo()
    {
        return $this->manufacturersInfo;
    }
}
