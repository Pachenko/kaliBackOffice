<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Entity\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="file_image", type="string", length=255)
     */
    private $fileImage;
    
    /**
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="type")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="id")
     */
    protected $produit;


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
     * @return Image
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
     * Set fileImage
     *
     * @param string $fileImage
     * @return Image
     */
    public function setFileImage($fileImage)
    {
        $this->fileImage = $fileImage;

        return $this;
    }

    /**
     * Get fileImage
     *
     * @return string 
     */
    public function getFileImage()
    {
        return $this->fileImage;
    }
    
    /**
     * Get Produit
     *
     * @return \Gbl\BackOfficeBundle\Entity\Produit
     */
    public function getProduit()
    {
    	return $this->produit;
    }
    
    /**
     * Set Produit
     * @param Produit $produit
     * @return Produit
     */
    public function setProduit($produit)
    {
    	$this->produit = $produit;
    	 
    	return $this;
    }
}
