<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\ThemeRepository")
 */
class Theme
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
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=255)
     */
    private $slogan;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="image_slider", type="string", length=255)
     */
    private $imageSlider;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="type")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
    	$this->logo 		= '';
    	$this->slogan 		= '';
    	$this->titre 		= '';
    	$this->imageSlider 	= '';
    }
    
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
     * Set logo
     *
     * @param string $logo
     * @return Theme
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set slogan
     *
     * @param string $slogan
     * @return Theme
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Theme
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set imageSlider
     *
     * @param string $imageSlider
     * @return Theme
     */
    public function setImageSlider($imageSlider)
    {
        $this->imageSlider = $imageSlider;

        return $this;
    }

    /**
     * Get imageSlider
     *
     * @return string 
     */
    public function getImageSlider()
    {
        return $this->imageSlider;
    }
}
