<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends Controller
{
	/**
	 * @Route("/commandes/liste/{page}", name="commandes.liste")
	 * @Template()
	 */
	public function commandeAction($page)
	{
		$maxCommandes = $this->container->getParameter('max_commandes_per_page');
		
		$commandes_count = $this->get('gbl.commande_manager')
								->loadCommande();
		var_dump($commandes_count); die();
		
	    if (!$commandes = $this->get('gbl.commande_manager')->loadCommande()) {
	        throw new NotFoundHttpException($this->get('translator')->trans('Il n\'y a pas de commande'));
	    }
	    
	    return array('commandes' => $commandes);
	}
}