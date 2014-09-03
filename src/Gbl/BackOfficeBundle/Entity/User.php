<?php

namespace Gbl\BackOfficeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Translation\Tests\String;
use Symfony\Component\Validator\Constraints\Date;

/**
 * User
 * 
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class User extends BaseUser
{
	/**
	 * @var integer
	 * 
	 * @ORM\Id
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @var String
	 * 
	 * @ORM\Column(name="nom", type="string", length=255)
	 */
	protected $nom;
	
	/**
	 * @var String
	 *
	 * @ORM\Column(name="prenom", type="string", length=255)
	 */
	protected $prenom;
	
	/**
	 * @var String
	 *
	 * @ORM\Column(name="adresse", type="string", length=255)
	 */
	protected $adresse;
	
	/**
	 * @var String
	 *
	 * @ORM\Column(name="ville", type="string", length=255)
	 */
	protected $ville;
	
	/**
	 * @var String
	 *
	 * @ORM\Column(name="code_postal", type="integer", length=5)
	 */
	protected $codePostal;
	
	/**
	 * @var String
	 *
	 * @ORM\Column(name="pays", type="string", length=255)
	 */
	protected $pays;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_naissance", type="date")
	 */
	protected $dateNaissance;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="telephone_fixe", type="integer", length=11)
	 */
	protected $telephoneFixe;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="telephone_portable", type="integer", length=11)
	 */
	protected $telephonePortable;

	public function __construct()
	{
		parent::__construct();
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
    
    
}
