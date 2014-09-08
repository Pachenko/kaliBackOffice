<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProduitRestController extends Controller
{
	/**
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getProduitAction($produit){
		$produits = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Produit')->find($produit);
	
		if(!is_object($produits)){
			throw $this->createNotFoundException();
		}
	
		return $produits;
	}
}