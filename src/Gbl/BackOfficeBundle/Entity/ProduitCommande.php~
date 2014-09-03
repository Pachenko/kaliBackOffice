<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit_commande")
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\ProduitCommandeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ProduitCommande
{
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Commande", inversedBy="pc")
	 * @ORM\JoinColumn(name="id_commande", referencedColumnName="id")
	 * */
	protected $commandes;
	
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Produit", inversedBy="pc")
	 * @ORM\JoinColumn(name="id_produit", referencedColumnName="id")
	 * */
	protected $produits;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quantite", type="integer")
	 */
	protected $quantite;
	
	public function __construct()
	{
		$this->produits  = new \Doctrine\Common\Collections\ArrayCollection();
		$this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
		$this->quantite  = 0;
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
     * Set quantite
     *
     * @param integer $quantite
     * @return ProduitCommande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set commandes
     *
     * @param \Gbl\BackOfficeBundle\Entity\Commande $commandes
     * @return ProduitCommande
     */
    public function setCommandes(\Gbl\BackOfficeBundle\Entity\Commande $commandes = null)
    {
        $this->commandes = $commandes;

        return $this;
    }

    /**
     * Get commandes
     *
     * @return \Gbl\BackOfficeBundle\Entity\Commande 
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Set produits
     *
     * @param \Gbl\BackOfficeBundle\Entity\Produit $produits
     * @return ProduitCommande
     */
    public function setProduits(\Gbl\BackOfficeBundle\Entity\Produit $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \Gbl\BackOfficeBundle\Entity\Produit 
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
