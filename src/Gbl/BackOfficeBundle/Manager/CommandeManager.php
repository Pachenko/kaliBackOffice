<?php

namespace Gbl\BackOfficeBundle\Manager;

use Doctrine\ORM\EntityManager;
use Gbl\BackOfficeBundle\Manager\BaseManager;
use Gbl\BackOfficeBundle\Entity\Commande;

class CommandeManager extends BaseManager
{
	protected $em;
	
	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}
	
	public function loadCommande() 
	{
		return $this->getRepository()
					->findAll();
	}
	
	public function loadCommandeById($commandeId) {
		return $this->getRepository()
					->findOneBy(
						array(
							'id' => $commandeId		
						));
	}
	
	public function saveCommande(Commande $commande)
	{
		$this->persistAndFlush($commande);
	}
	
	public function getRepository()
	{
		return $this->em->getRepository('GblBackOfficeBundle:Commande');
	}
}