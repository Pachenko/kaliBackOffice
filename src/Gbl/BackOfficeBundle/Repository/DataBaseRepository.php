<?php

namespace Gbl\BackOfficeBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DataBaseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DataBaseRepository extends EntityRepository
{
	
	public function getTable(){
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
				'show tables');
		
		$products = $query->getResult();
	}
}