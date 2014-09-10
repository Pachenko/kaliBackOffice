<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\User;
use Gbl\BackOfficeBundle\Form\Type\UserFormType;

class UserController extends Controller
{
	/**
	 * @Route("/user")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:User');
		$listeUsers = $repository->findAll();

		return $this->render('GblBackOfficeBundle:User:index.html.twig', array('users' => $listeUsers));
	}
	
	/**
	 * @Route("/user/new")
	 */
	public function newAction()
	{
		$user = new User();
		
		$form = $this->createForm(new UserFormType(), $user);
		
		$request = $this->get('request');
	
		if ($request->getMethod() == 'POST'){
			$form->bind($request);
			if($form->isValid()){
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				$this->get('session')->getFlashBag()->add(
						'notice',
						'Utilisateur Ajouté'
				);
				
				return $this->redirect($this->generateUrl('user.index'));
			}
		}
				
		return $this->render('GblBackOfficeBundle:User:new.html.twig',array(
    	'form' => $form->createView(),));
	}
	
	/**
	 * @Route("/user/edit/{id}")
	 */
	public function editAction(Request $request,$id)
	{
		$user = $this->getDoctrine()->getRepository('GblBackOfficeBundle:User')->find($id);
			
		if ($user) {
			$form = $this->createForm(new UserFormType(), $user);
		}
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
				'notice',
				'Utilisateur modifiée'
			);
			return $this->redirect($this->generateUrl('user.index'));
				
		} else {
			return $this->render('GblBackOfficeBundle:User:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * @Route("/user/delete/{id}")
	 */
	public function deleteAction($id)
	{
		$cat = $this->getDoctrine()->getRepository('GblBackOfficeBundle:User')->find($id);
	
		if ($cat) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($cat);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Utilisateur supprimé'
			);
			return $this->redirect($this->generateUrl('user.index'));
		} else {
			$form = $this->createForm(new UserFormType(), $cat);
			return $this->redirect($this->generateUrl('user.index'));
		}
	}
	
	/**
	 * @Route("/user/client")
	 */
	public function clientAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:User');
		$listeUsers = $repository->getClients();
	
		return $this->render('GblBackOfficeBundle:User:client.html.twig', array('users' => $listeUsers));
	}
}
