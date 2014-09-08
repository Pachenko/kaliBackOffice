<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CommandeRestController extends Controller 
{
	/**
	 * Permet de récupérer la commande d'un utilisateur
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getCommandeAction($utilisateur){
		$idUser = $this->getDoctrine()
						->getRepository('GblBackOfficeBundle:User')
						->findOneBy(array('username' => $utilisateur))
						->getId();
		
		$commande = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Commande')->findBy(array('user' => $idUser));
	
		return $commande;
	}
}