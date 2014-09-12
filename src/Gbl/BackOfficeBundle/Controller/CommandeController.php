<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

class CommandeController extends Controller
{
	/**
	 * Liste toutes les commandes
	 * 
	 * @Route("/commandes/liste/{page}", name="commandes.liste")
	 * @Route("/commandes/liste/", defaults={"page" = 1})
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function commandeAction($page)
	{
		$maxCommandes = $this->container->getParameter('max_commandes_per_page');
		
		$commandes_count = $this->get('gbl.commande_manager')
								->count();
		
		$pagination = array(
			'page' 		   => $page,
			'route' 	   => 'commandes.liste',
			'pages_count'  => ceil($commandes_count / $maxCommandes),
			'route_params' => array()
		);
		
	    if (!$commandes = $this->get('gbl.commande_manager')
	    					   ->getList($page, $maxCommandes)) {
	        throw new NotFoundHttpException($this->get('translator')->trans('Il n\'y a pas de commande'));
	    }
	    
	    return array(
	    	'commandes'  => $commandes,
	    	'pagination' => $pagination,
	    );
	}
}