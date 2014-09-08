<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\ProduitRepository")
 * 
 * @ExclusionPolicy("all") 
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     * @Groups({"Default"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float")
     */
    private $poids;

    /**
     * @var float
     *
     * @ORM\Column(name="dimensions", type="string")
     */
    private $dimensions;

    /**
     * @var string
     *
     * @ORM\Column(name="stock", type="string")
     */
    protected $stock;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="vente_flash", type="boolean")
     */
    protected $venteFlash;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="date", nullable=true)
     */
    private $updated;

    /**
	 * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="produits")
	 * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id")
     */
    private $categorie;
    
	/**
     * @ORM\OneToMany(targetEntity="ProduitCommande" , mappedBy="produits" , cascade={"all"})
     */
    protected $pc;
    
    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="image")
     */
    private $images;

    public function __construct()
    {
    	$this->nom 		   	= '';
    	$this->reference   	= '';
    	$this->description 	= '';
    	$this->prix 	   	= 0.0;
    	$this->poids 	   	= 0.0;    	
    	$this->dimensions	= '';
    	$this->stock		= 0;
    	$this->venteFlash	= false;
    	$this->created		= new \DateTime();
    	$this->images		= new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set poids
     *
     * @param float $poids
     * @return Produit
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set dimensions
     *
     * @param string $dimensions
     * @return Produit
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * Get dimensions
     *
     * @return string 
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }
    
    /**
     * Set venteFlash
     *
     * @param boolean $venteFlash
     * @return Produit
     */
    public function setVenteFlash($venteFlash)
    {
    	$this->venteFlash = $venteFlash;
    
    	return $this;
    }
    
    /**
     * Get venteFlash
     *
     * @return boolean
     */
    public function getVenteFlash()
    {
    	return $this->venteFlash;
    }

    /**
     * Set categorie
     *
     * @param \Gbl\BackOfficeBundle\Entity\Categorie $categorie
     * @return Produit
     */
    public function setCategorie(\Gbl\BackOfficeBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Gbl\BackOfficeBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add pc
     *
     * @param \Gbl\BackOfficeBundle\Entity\ProduitCommande $pc
     * @return Produit
     */
    public function addPc(\Gbl\BackOfficeBundle\Entity\ProduitCommande $pc)
    {
        $this->pc[] = $pc;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Gbl\BackOfficeBundle\Entity\Image $images
     */
    public function removeImages(\Gbl\BackOfficeBundle\Entity\Image $image)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * Add images
     *
     * @param \Gbl\BackOfficeBundle\Entity\Image $images
     * @return Produit
     */
    public function addImages(\Gbl\BackOfficeBundle\Entity\Image $images)
    {
    	$this->images[] = $images;
    
    	return $this;
    }
}
