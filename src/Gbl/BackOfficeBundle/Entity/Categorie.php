<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\CategorieRepository")
 * 
 * @ExclusionPolicy("all") 
 */
class Categorie
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
     * @ORM\Column(name="description", type="string", length=255)
     * @Expose
     * @Groups({"Default"})
     */
    private $description;
    
//     /**
//      * @var float
//      *
//      * @ORM\Column(name="eco_participation", type="float")
//      * @Expose
//      * @Groups({"Default"})
//      */
//     private $ecoParticipation;
    
//     /**
//      * @var string
//      *
//      * @ORM\Column(name="poids", type="string", length=255, nullable=true)
//      * @Expose
//      * @Groups({"Default"})
//      */
//     private $poids;

    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="categorie", cascade={"remove"})
     * @Expose
     * @Groups({"Default"})
     */
    protected $produits;
    
    public function __construct()
    {
    	$this->produits    = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Categorie
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
     * Set description
     *
     * @param string $description
     * @return Categorie
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
    
//     /**
//      * Set ecoParticipation
//      *
//      * @param float $ecoParticipation
//      * @return Categorie
//      */
//     public function setEcoParticipation($ecoParticipation)
//     {
//     	$this->ecoParticipation = $ecoParticipation;
    
//     	return $this;
//     }
    
//     /**
//      * Get ecoParticipation
//      *
//      * @return float
//      */
//     public function getEcoParticipation()
//     {
//     	return $this->ecoParticipation;
//     }
    
//     /**
//      * Set poids
//      *
//      * @param string $poids
//      * @return Categorie
//      */
//     public function setPoids($poids)
//     {
//     	$this->poids = $poids;
    
//     	return $this;
//     }
    
//     /**
//      * Get poids
//      *
//      * @return string
//      */
//     public function getPoids()
//     {
//     	return $this->poids;
//     }

    /**
     * Add produits
     *
     * @param \Gbl\BackOfficeBundle\Entity\Produit $produits
     * @return Categorie
     */
    public function addProduit(\Gbl\BackOfficeBundle\Entity\Produit $produits)
    {
        $this->produits[] = $produits;

        return $this;
    }

    /**
     * Remove produits
     *
     * @param \Gbl\BackOfficeBundle\Entity\Produit $produits
     */
    public function removeProduit(\Gbl\BackOfficeBundle\Entity\Produit $produits)
    {
        $this->produits->removeElement($produits);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduits()
    {
        return $this->produits;
    }
    
}