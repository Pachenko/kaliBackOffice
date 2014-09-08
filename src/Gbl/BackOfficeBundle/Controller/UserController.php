<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\User;
use Gbl\BackOfficeBundle\Form\UserType;

class UserController extends Controller
{
	/**
	 * @Route("/user/index")
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
	public function newaddAction()
	{
		$user = new User();
		
		$form = $this->createForm(new UserType(), $user);
		
		$request = $this->get('request');
	
		if ($request->getMethod() == 'POST'){
			$form->bind($request);
			if($form->isValid()){
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->render('GblBackOfficeBundle:User:new.html.twig',array(
						'form' => $form->createView(),));
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
			$form = $this->createForm(new UserType(), $user);
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
			$form = $this->createForm(new UserType(), $cat);
			return $this->redirect($this->generateUrl('user.index'));
		}
	}
}
