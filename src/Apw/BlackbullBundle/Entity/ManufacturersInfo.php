<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManufacturersInfo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apw\BlackbullBundle\Entity\ManufacturersInfoRepository")
 */
class ManufacturersInfo
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
     * @ORM\Column(name="manufacturers_url", type="string", length=255, nullable=true)
     */
    private $manufacturersUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="url_clicked", type="integer", nullable=true)
     */
    private $urlClicked;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_last_click", type="datetime", nullable=true)
     */
    private $dateLastClick;

    /**
     * @ORM\OneToOne(targetEntity="Manufacturers", inversedBy="manufacturersInfo")
     * @ORM\JoinColumn(name="manufacturers_id", referencedColumnName="id")
     **/
    private $manufacturers;

    /**
     * @ORM\ManyToOne(targetEntity="Languages", inversedBy="manufacturersInfo")
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
     * Set manufacturersUrl
     *
     * @param string $manufacturersUrl
     * @return ManufacturersInfo
     */
    public function setManufacturersUrl($manufacturersUrl)
    {
        $this->manufacturersUrl = $manufacturersUrl;

        return $this;
    }

    /**
     * Get manufacturersUrl
     *
     * @return string 
     */
    public function getManufacturersUrl()
    {
        return $this->manufacturersUrl;
    }

    /**
     * Set urlClicked
     *
     * @param integer $urlClicked
     * @return ManufacturersInfo
     */
    public function setUrlClicked($urlClicked)
    {
        $this->urlClicked = $urlClicked;

        return $this;
    }

    /**
     * Get urlClicked
     *
     * @return integer 
     */
    public function getUrlClicked()
    {
        return $this->urlClicked;
    }

    /**
     * Set dateLastClick
     *
     * @param \DateTime $dateLastClick
     * @return ManufacturersInfo
     */
    public function setDateLastClick($dateLastClick)
    {
        $this->dateLastClick = $dateLastClick;

        return $this;
    }

    /**
     * Get dateLastClick
     *
     * @return \DateTime 
     */
    public function getDateLastClick()
    {
        return $this->dateLastClick;
    }

    /**
     * Set languages
     *
     * @param \Apw\BlackbullBundle\Entity\Languages $languages
     * @return ManufacturersInfo
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
     * Set manufacturers
     *
     * @param \Apw\BlackbullBundle\Entity\Manufacturers $manufacturers
     * @return ManufacturersInfo
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
}
