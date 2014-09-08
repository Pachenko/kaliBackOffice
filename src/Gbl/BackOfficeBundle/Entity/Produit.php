<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\HasLifecycleCallbacks
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
     * @var string
     *
     * @ORM\Column(name="file_img", type="string", length=255, nullable=true)
     */
    private $fileImg;

    public function __construct()
    {
    	$this->created = new \DateTime();
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
     * @param Categorie $categorie
     * @return Produit
     */
    public function setCategorie(Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add pc
     *
     * @param ProduitCommande $pc
     * @return Produit
     */
    public function addPc(\Gbl\BackOfficeBundle\Entity\ProduitCommande $pc)
    {
        $this->pc[] = $pc;

        return $this;
    }

    /**
     * Set fileImg
     *
     * @param string $fileImg
     * @return Produit
     */
    public function setFileImg($fileImg)
    {
        $this->fileImg = $fileImg;

        return $this;
    }

    /**
     * Get fileImg
     *
     * @return string 
     */
    public function getFileImg()
    {
        return $this->fileImg;
    }
    
	public function getFileImgUpload() {
        return $this->fileImgUpload;
    }

    public function setFileImgUpload($fileImgUpload) {
        $this->fileImgUpload = $fileImgUpload;
    }
    
	/**
    * @Assert\File(maxSize="6000000")
    */
    protected $fileImgUpload;

    public function getAbsoluteFileImg()
    {
        return null === $this->fileImg ? null : $this->getUploadRootDir() . '/' . $this->fileImg;
    }

    public function getWebFileImg()
    {
        return null === $this->fileImg ? null : $this->getUploadDir() . '/' . $this->fileImg;
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if(null !== $this->fileImgUpload) {
            $this->fileImg = 'file_img_' . sha1(uniqid(mt_rand(), true)) . '.' . $this->fileImgUpload->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function uploadFiles()
    {
        if(null !== $this->fileImgUpload) {
            $this->fileImgUpload->move($this->getUploadRootDir(), $this->fileImg);

            unset($this->fileImgUpload);
        }
    }
}
