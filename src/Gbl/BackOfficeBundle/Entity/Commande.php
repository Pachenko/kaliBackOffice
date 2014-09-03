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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

	/**
     * @ORM\OneToMany(targetEntity="ProduitCommande" , mappedBy="commandes" , cascade={"all"})
     */
    protected $pc;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="type")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    protected $user;

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
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
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
    
    public function getUser()
    {
    	return $this->user;
    }
    
    public function setUser($user)
    {
    	$this->user = $user;
    }
}
