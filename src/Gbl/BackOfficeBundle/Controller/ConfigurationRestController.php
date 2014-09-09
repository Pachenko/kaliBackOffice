<?php

namespace Gbl\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ConfigurationRestController extends Controller
{
	/**
	 * Permet de récupérer la configuration du site
	 *
	 * @View(serializerGroups={"Default"})
	 */
	public function getConfigurationAction($site)
	{
		$configuration = $this->getDoctrine()
							   ->getRepository('GblBackOfficeBundle:Configuration')
							   ->findOneBy(array('nomSite' => $site));

		if(!is_object($configuration)){
			throw $this->createNotFoundException();
		}
		
		return $configuration;
	}
}

