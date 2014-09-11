<?php

namespace Gbl\BackOfficeBundle\Manager;

use Doctrine\ORM\EntityManager;
use Gbl\BackOfficeBundle\Manager\BaseManager;
use Gbl\BackOfficeBundle\Entity\Categorie;

class CategorieManager extends BaseManager
{
	protected $em;
	
	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}
	
	public function loadCategorie() 
	{
		return $this->getRepository()
					->findAll();
	}
	
	public function count()
	{
		return  $this->getRepository()
			->createQueryBuilder('id')
			->select('COUNT(id)')
			->getQuery()
			->getSingleScalarResult();
	}
	
	public function saveCommande(Categorie $categorie)
	{
		$this->persistAndFlush($categorie);
	}
	
	public function getRepository()
	{
		return $this->em->getRepository('GblBackOfficeBundle:Categorie');
	}
}