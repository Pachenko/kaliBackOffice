<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Transporteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Repository\TransporteurRepository")
 * 
 * @ExclusionPolicy("all") 
 */
class Transporteur
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
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="transporteur")
     * @Expose
     * @Groups({"Default"})
     */
    protected $commandes;

    public function __construct()
    {
    	$this->nom    = '';
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
     * @return Transporteur
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
     * Add commandes
     *
     * @param \Gbl\BackOfficeBundle\Entity\Commande $commandes
     * @return Transporteur
     */
    public function addCommande(\Gbl\BackOfficeBundle\Entity\Commande $commandes)
    {
    	$this->commandes[] = $commandes;
    
    	return $this;
    }
    
    /**
     * Remove commandes
     *
     * @param \Gbl\BackOfficeBundle\Entity\Commande $commandes
     */
    public function removeProduit(\Gbl\BackOfficeBundle\Entity\Commande $commandess)
    {
    	$this->commandes->removeElement($commandes);
    }
    
    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
    	return $this->commandes;
    }
    
}
