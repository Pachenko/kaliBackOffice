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
	 * @Route("/user/add")
	 */
	public function addAction()
	{
		$user = new User();
		
		$formBuilder = $this->createFormBuilder($user);
		
		$formBuilder
			->add('nom', 				'text')
			->add('prenom',				'text')
			->add('username',			'text')
			->add('password',			'password')
			->add('email',				'email')
			->add('adresse',			'text')
			->add('ville',				'text')
			->add('codePostal',			'text')
			->add('pays',				'text')
			->add('dateNaissance',		'date')
			->add('telephoneFixe',		'integer')
			->add('telephonePortable',	'integer');
		
		$form = $formBuilder->getForm();
		
		$request = $this->get('request');
	
		if ($request->getMethod() == 'POST'){
			$form->bind($request);
			if($form->isValid()){
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->render('GblBackOfficeBundle:User:add.html.twig',array(
						'form' => $form->createView(),));
			}
		}
				
		return $this->render('GblBackOfficeBundle:User:add.html.twig',array(
    'form' => $form->createView(),));
	}
	
	public function viewAction()
	{
		
	}
}
