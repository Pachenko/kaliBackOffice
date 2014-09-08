<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ThemeRestController extends Controller  
{
	/**
	 * Permet de récupérer un thème selon l'utilisateur
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getThemeAction($idUser)
	{
		$theme = $this->getDoctrine()
					  ->getRepository('GblBackOfficeBundle:Theme')
					  ->findOneBy(array('user' => $idUser));
	
		if(!is_object($theme)){
			throw $this->createNotFoundException();
		}
	
		return $theme;	
	}
	
	/**
	 * Permet de récupérer tous les thèmes
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getThemesAction(){
		$themes = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Theme')->findAll();
	
		return $themes;
	}
}