<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\Column(name="numero", type="string", length=255)
     */
    private $numero;
    
    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;
    
    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paiement", type="date")
     */
    private $datePaiement;    

	/**
     * @ORM\OneToMany(targetEntity="ProduitCommande" , mappedBy="commandes" , cascade={"all"})
     */
    protected $pc;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="type")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Transporteur", inversedBy="type")
     * @ORM\JoinColumn(name="id_transporteur", referencedColumnName="id")
     */
    protected $transporteur;
    
    /**
     * @ORM\ManyToOne(targetEntity="Promotion", inversedBy="type")
     * @ORM\JoinColumn(name="id_promotion", referencedColumnName="id")
     */
    protected $promotion;

    public function __construct() {

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
     * Set numero
     *
     * @param string $numero
     * @return Commande
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }
    
    /**
     * Set statut
     *
     * @param string $statut
     * @return Commande
     */
    public function setStatut($statut)
    {
    	$this->statut = $statut;
    
    	return $this;
    }
    
    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
    	return $this->statut;
    }
    
    /**
     * Get Prix
     *
     * @return \Gbl\BackOfficeBundle\Entity\Prix
     */
    public function getPrix()
    {
    	return $this->prix;
    }
    
    /**
     * Set Prix
     * @param Prix $prix
     * @return Prix
     */
    public function setPrix($prix)
    {
    	$this->prix = $prix;
    
    	return $this;
    }
    
    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
    	return $this->date;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get datePaiement
     *
     * @return \DateTime 
     */
    public function getDatePaiement()
    {
        return $this->datePaiement;
    }
    
    /**
     * Set datePaiement
     *
     * @param \DateTime $datePaiement
     * @return Commande
     */
    public function setDatePaiement($datePaiement)
    {
    	$this->datePaiement = $datePaiement;
    
    	return $this;
    }    

    /**
     * Add pc
     *
     * @param \Gbl\BackOfficeBundle\Entity\ProduitCommande $pc
     * @return Commande
     */
    public function addPc(\Gbl\BackOfficeBundle\Entity\ProduitCommande $pc)
    {
        $this->pc[] = $pc;

        return $this;
    }

    /**
     * Remove pc
     *
     * @param \Gbl\BackOfficeBundle\Entity\ProduitCommande $pc
     */
    public function removePc(\Gbl\BackOfficeBundle\Entity\ProduitCommande $pc)
    {
        $this->pc->removeElement($pc);
    }

    /**
     * Get pc
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPc()
    {
        return $this->pc;
    }
    
    /**
     * Get User
     * 
     * @return \Gbl\BackOfficeBundle\Entity\User
     */
    public function getUser()
    {
    	return $this->user;
    }
    
    /**
     * Set User
     * @param User $user
     * @return User
     */
    public function setUser($user)
    {
    	$this->user = $user;
    	
    	return $this;
    }
    
    /**
     * Get Transporteur
     *
     * @return \Gbl\BackOfficeBundle\Entity\Transporteur
     */
    public function getTransporteur()
    {
    	return $this->transporteur;
    }
    
    /**
     * Set Transporteur
     * @param Transporteur $transporteur
     * @return Transporteur
     */
    public function setTransporteur($transporteur)
    {
    	$this->transporteur = $transporteur;
    	 
    	return $this;
    }
    
    /**
     * Get Promotion
     *
     * @return \Gbl\BackOfficeBundle\Entity\Promotion
     */
    public function getPromotion()
    {
    	return $this->promotion;
    }
    
    /**
     * Set Promotion
     * @param Promotion $promotion
     * @return Promotion
     */
    public function setPromotion($promotion)
    {
    	$this->promotion = $promotion;
    
    	return $this;
    }
    
}
