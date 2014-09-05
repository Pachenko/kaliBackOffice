<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="nom", type="string", length=255)
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
     * @ORM\Column(name="description", type="string", length=255)
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
     * @ORM\Column(name="dimensions", type="float")
     */
    private $dimensions;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
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
     * @ORM\Column(name="updated", type="date")
     */
    private $updated;

    /**
	 * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="produits", cascade={"remove"})
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
    	$this->dimensions	= 0.0;
    	$this->stock		= 0;
    	$this->venteFlash	= false;
    	$this->created		= new \DateTime();
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
     * @param float $dimensions
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
     * @return float 
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
