<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\User;

class UserController extends Controller
{
	public function indexAction()
	{
		
	}
	
	/**
	 * @Route("/adduser")
	 */
	public function addAction()
	{
		$user = new User();
		
		$formBuilder = $this->createFormBuilder($user);
		
		$formBuilder
			->add('nom', 				'text')
			->add('prenom',				'text')
			->add('adresse',			'text')
			->add('ville',				'text')
			->add('codePostal',			'text')
			->add('pays',				'text')
			->add('dateNaissance',		'date')
			->add('telephoneFixe',		'integer')
			->add('telephonePortable',	'integer');
		
		$form = $formBuilder->getForm();
				
		return $this->render('GblBackOfficeBundle:User:add.html.twig',array(
    'form' => $form->createView(),));
	}
	
	public function viewAction()
	{
		
	}
}