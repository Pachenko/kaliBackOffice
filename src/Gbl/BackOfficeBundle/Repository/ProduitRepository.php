<?php

namespace Gbl\BackOfficeBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends EntityRepository
{
	public function findAllWithStock()
	{
		return $this->getEntityManager()
		->createQuery('SELECT p FROM GblBackOfficeBundle:Produit p WHERE p.stock > 0')
		->getResult();
	}
	
	public function findAllNotStock()
	{
		return $this->getEntityManager()
		->createQuery('SELECT p FROM GblBackOfficeBundle:Produit p WHERE p.stock <= 0')
		->getResult();
	}
	
	public function findAllWithVenteFlashAndWithStock()
	{
		return $this->getEntityManager()
		->createQuery('SELECT p FROM GblBackOfficeBundle:Produit p WHERE p.venteFlash = true AND p.stock > 0')
		->getResult();
	}
	
	public function findAllWithVenteFlashAndNotStock()
	{
		return $this->getEntityManager()
		->createQuery('SELECT p FROM GblBackOfficeBundle:Produit p WHERE p.venteFlash = true AND p.stock <= 0')
		->getResult();
	}
	
	public function findTop10()
	{
		return $this->getEntityManager()
		->createQuery('
				SELECT SUM(pc.quantite) AS HIDDEN stat_sum_realised, p FROM GblBackOfficeBundle:Produit p 
				INNER JOIN GblBackOfficeBundle:ProduitCommande pc WITH p.id = pc.produits
				INNER JOIN GblBackOfficeBundle:Commande c WITH c.id = pc.commandes
				WHERE p.stock > 0
				GROUP BY  p.id
				')
		->setMaxResults(10)
		->getResult();
	}
	
}
