<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends Controller
{
	/**
	 * @Route("/commandes", name="commandes.liste")
	 * @Template()
	 */
	public function commandeAction()
	{
	    if (!$commandes = $this->get('gbl.commande_manager')->loadCommande()) {
	        throw new NotFoundHttpException($this->get('translator')->trans('Il n\'y a pas de commande'));
	    }
	    
	    return array('commandes' => $commandes);
	}
}