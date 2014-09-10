<?php

namespace Gbl\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gbl\BackOfficeBundle\Entity\PromotionRepository")
 */
class Promotion
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;
    
    /**
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="transporteur")
     */
    protected $commandes;


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
     * Set code
     *
     * @param string $code
     * @return Promotion
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Promotion
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Promotion
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
    
    /**
     * Add commandes
     *
     * @param \Gbl\BackOfficeBundle\Entity\Commande $commandes
     * @return Promotion
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
