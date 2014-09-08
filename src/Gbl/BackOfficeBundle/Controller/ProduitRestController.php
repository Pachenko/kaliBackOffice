<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProduitRestController extends Controller
{
	/**
	 * Permet de récupérer un produit
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
	
	/**
	 * Permet de récupérer tous les produits
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getProduitsAction(){
		$produits = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Produit')->findAll();
	
		return $produits;
	}
}