<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Theme;
use Gbl\BackOfficeBundle\Form\Type\ThemeType;

class ThemeController extends Controller
{
/**
	 * @Route("/theme/index", name="theme.index")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Produit');
		$listeproduits = $repository->findAll();
		
		return $this->render('GblBackOfficeBundle:Produit:index.html.twig', array('produits' => $listeproduits));
	}
	
	
}
