<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CategorieRestController extends Controller
{
	/**
	 * Permet de récupérer une catégorie
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getCategorieAction($categorie){
		$categories = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Categorie')->find($categorie);
	
		if(!is_object($categories)){
			throw $this->createNotFoundException();
		}
	
		return $categories;	
	}
	
	/**
	 * Permet de récupérer toutes les catégories
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getCategoriesAction(){
		$categories = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('GblBackOfficeBundle:Categorie')
						   ->findAllGroupBy();
		
		return $categories;
	}
}