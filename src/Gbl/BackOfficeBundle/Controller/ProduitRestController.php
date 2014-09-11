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
	public function getProduitAction($reference){
		$produit = $this->getDoctrine()
						 ->getRepository('GblBackOfficeBundle:Produit')
						 ->findOneBy(array('reference' => $reference));
		
		return $produit;
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
	
	/**
	 * Permet de récupérer les produits d'une categorie
	 * 
	 * @View(serializerGroups={"Default"})
	 */
	public function getProductAction($idCategorie)
	{
		$idCategorie = $this->getDoctrine()
					   ->getRepository('GblBackOfficeBundle:Categorie')
					   ->findOneBy(array('id' => $idCategorie))
					   ->getId();
		
		$produits = $this->getDoctrine()
						 ->getRepository('GblBackOfficeBundle:Produit')
						 ->findBy(array('categorie' => $idCategorie));

		return $produits;
	}
}