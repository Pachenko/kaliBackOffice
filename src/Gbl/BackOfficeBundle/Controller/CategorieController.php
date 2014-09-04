<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Categorie;

class CategorieController extends Controller
{
	/**
	 * @Route("/categorie/index", name="categorie.index")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Categorie');
		$listeCategories = $repository->findAll();
		
		return $this->render('GblBackOfficeBundle:Categorie:index.html.twig', array('categories' => $listeCategories));
	}
	
	public function newAction()
	{
		
	}
	
	public function viewAction()
	{
		
	}
	
	public function editAction()
	{
		
	}
}