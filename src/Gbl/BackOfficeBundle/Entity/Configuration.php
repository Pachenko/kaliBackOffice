<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Configuration
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\ConfigurationRepository")
 * 
 * @ExclusionPolicy("all") 
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
     * @Expose
     * @Groups({"Default"})
     */
    private $nomSite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="panier", type="boolean")
     * @Expose
     * @Groups({"Default"})
     */
    private $panier;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_theme", type="integer")
     * @ORM\OneToOne(targetEntity="Theme")
     * @Expose
     * @Groups({"Default"})
     */
    private $theme;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_transporteur_leger", type="integer")
     * @ORM\OneToOne(targetEntity="Transporteur")
     * @Expose
     * @Groups({"Default"})
     */
    private $transporteurLeger;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_transporteur_lourd", type="integer")
     * @ORM\OneToOne(targetEntity="Transporteur")
     * @Expose
     * @Groups({"Default"})
     */
    private $transporteurLourd;

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
     * Set nomSite
     *
     * @param string $nomSite
     * @return Configuration
     */
    public function setNomSite($nomSite)
    {
    	$this->nomSite = $nomSite;
    
    	return $this;
    }
    
    /**
     * Get nomSite
     *
     * @return string
     */
    public function getNomSite()
    {
    	return $this->nomSite;
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
    public function setTheme(Theme $theme = null)
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

    /**
     * Get transporteurLeger
     *
     * @return integer 
     */
    public function getTransporteurLeger()
    {
        return $this->transporteurLeger;
    }
    
    /**
     * Set transporteurLeger
     *
     * @param integer $transporteurLeger
     * @return Configuration
     */
    public function setTransporteurLeger(Transporteur $transporteurLeger)
    {
    	$this->transporteurLeger = $transporteurLeger;
    
    	return $this;
    }
    
    /**
     * Set transporteurLourd
     *
     * @param integer $transporteurLourd
     * @return Configuration
     */
    public function setTransporteurLourd(Transporteur $transporteurLourd)
    {
    	$this->transporteurLourd = $transporteurLourd;
    
    	return $this;
    }
    
    /**
     * Get transporteurLourd
     *
     * @return integer
     */
    public function getTransporteurLourd()
    {
    	return $this->transporteurLourd;
    }
}
