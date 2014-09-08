<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TransporteurRestController extends Controller
{
	/**
	 * Permet de récupérer un transporteur
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getTransporteurAction($idTransporteur)
	{
		$transporteur = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Transporteur')->find($idTransporteur);
	
		if(!is_object($transporteur)){
			throw $this->createNotFoundException();
		}
	
		return $transporteur;
	}
	
	/**
	 * Permet de récupérer tous les transporteurs
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getTransporteursAction(){
		$transporteurs = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Transporteur')->findAll();
	
		return $transporteurs;
	}
}