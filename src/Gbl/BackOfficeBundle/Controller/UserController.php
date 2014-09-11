<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\User;
use Gbl\BackOfficeBundle\Form\Type\UserFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class UserController extends Controller
{
	/**
	 * @Route("/user")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:User');
		$listeUsers = $repository->findAll();

		return $this->render('GblBackOfficeBundle:User:index.html.twig', array('users' => $listeUsers));
	}
	
	/**
	 * @Route("/user/new")
	 * @Secure(roles="ROLE_ADMIN")
	 * 
	 * Création d'un utilisateur
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function newAction(Request $request)
	{
		$user = new User();
		
		$form = $this->createForm(new UserFormType(), $user);
		
		$form->handleRequest($request);

		if($form->isValid()){
			
			$factory = $this->get('security.encoder_factory');
			$encoder = $factory->getEncoder($user);
			$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
			$user->setPassword($password);
			$user->setEnabled(true);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Utilisateur Ajouté'
			);
			
			return $this->redirect($this->generateUrl('user.index'));
		}
				
		return $this->render('GblBackOfficeBundle:User:new.html.twig',array(
    	'form' => $form->createView(),));
	}
	
	/**
	 * @Route("/user/edit/{id}")
	 * @Secure(roles="ROLE_ADMIN")
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
	 * @Secure(roles="ROLE_ADMIN")
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
	 * @Secure(roles="ROLE_ADMIN, ROLE_CLIENT")
	 */
	public function clientAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:User');
		$listeUsers = $repository->getClients();
	
		return $this->render('GblBackOfficeBundle:User:client.html.twig', array('users' => $listeUsers));
	}
}
