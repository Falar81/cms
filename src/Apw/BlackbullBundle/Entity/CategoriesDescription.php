<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriesDescription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\CategoriesDescriptionRepository")
 */
class CategoriesDescription
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
     * @ORM\Column(name="categories_name", type="string", length=32, nullable=true)
     */
    private $categoriesName;

    /**
    * @ORM\ManyToOne(targetEntity="Categories", inversedBy="categoryDescription")
    **/
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Languages", inversedBy="categoriesDescription")
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
     * Set categoriesName
     *
     * @param string $categoriesName
     * @return CategoriesDescription
     */
    public function setCategoriesName($categoriesName)
    {
        $this->categoriesName = $categoriesName;

        return $this;
    }

    /**
     * Get categoriesName
     *
     * @return string 
     */
    public function getCategoriesName()
    {
        return $this->categoriesName;
    }

    /**
     * Set languages
     *
     * @param \Apw\BlackbullBundle\Entity\Languages $languages
     * @return CategoriesDescription
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
     * Set category
     *
     * @param \Apw\BlackbullBundle\Entity\Categories $category
     * @return CategoriesDescription
     */
    public function setCategory(\Apw\BlackbullBundle\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Apw\BlackbullBundle\Entity\Categories
     */
    public function getCategory()
    {
        return $this->category;
    }
}
