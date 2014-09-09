<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Entity\ConfigurationRepository")
 */
class Configuration
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
     * @ORM\Column(name="nom_site", type="string", length=255)
     */
    private $nomSite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="panier", type="boolean")
     */
    private $panier;

    /**
     * @var integer
     *
     * @ORM\Column(name="theme", type="integer")
     */
    private $theme;


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
     * Set siteNom
     *
     * @param string $siteNom
     * @return Configuration
     */
    public function setSiteNom($siteNom)
    {
    	$this->siteNom = $siteNom;
    
    	return $this;
    }
    
    /**
     * Get siteNom
     *
     * @return string
     */
    public function getSiteNom()
    {
    	return $this->siteNom;
    }

    /**
     * Set panier
     *
     * @param boolean $panier
     * @return Configuration
     */
    public function setPanier($panier)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get panier
     *
     * @return boolean 
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set theme
     *
     * @param integer $theme
     * @return Configuration
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return integer 
     */
    public function getTheme()
    {
        return $this->theme;
    }
}
