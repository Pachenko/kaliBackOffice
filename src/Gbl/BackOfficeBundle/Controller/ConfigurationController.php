<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use Braincrafted\Bundle\BootstrapBundle\DependencyInjection\Configuration;
use Gbl\BackOfficeBundle\Form\Type\ConfigurationFormType;

class ConfigurationController extends Controller
{
	/**
	 * @Route("/configuration", name="configuration.index")
	 * @Template()
	 * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
	 */
	public function indexAction(Request $request)
	{
		$cfg = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Configuration')->findOneBy(array('nomSite' => 'kaliSiteVitrine'));
			
		if ($cfg) {
			$form = $this->createForm(new ConfigurationFormType(), $cfg);			
		}
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($cfg);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
				'notice',
				'Configuration modifiée'
			);
			return $this->redirect($this->generateUrl('configuration.index'));
				
		} else {
			return $this->render('GblBackOfficeBundle:Configuration:index.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
}