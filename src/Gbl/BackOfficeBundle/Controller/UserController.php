<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\User;
use Gbl\BackOfficeBundle\Form\Type\UserFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
	/**
	 * Affiche la liste des utilisateurs
	 * 
	 * @Route("/user")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:User');
		$listeUsers = $repository->findAll();

		return $this->render('GblBackOfficeBundle:User:index.html.twig', array('users' => $listeUsers));
	}
	
	/**
	 * Création d'un utilisateur
	 * 
	 * @Route("/user/new")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
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
	 * Editer un utilisateur
	 * 
	 * @Route("/user/edit/{id}")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
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
	 * Supprimer un utilisateur
	 * 
	 * @Route("/user/delete/{id}")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
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
	 * Affiche la liste des clients
	 * 
	 * @Route("/user/client")
	 * @Secure(roles="ROLE_ADMIN, ROLE_CLIENT, ROLE_POWER")
	 */
	public function clientAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:User');
		$listeUsers = $repository->getClients();
	
		return $this->render('GblBackOfficeBundle:User:client.html.twig', array('users' => $listeUsers));
	}
	
	/**
	 * Permet l'exportation des utilisateurs selon certains critères
	 * 
	 * @Route("/user/search")
	 * @Secure(roles="ROLE_ADMIN, ROLE_CLIENT, ROLE_POWER")
	 */
	public function searchAction(Request $request) {
		$user = new User ();
		
		/*
		 * $form = $this->createForm(new UserSearchType(), $user); $request = $this->get('request');
		 */
		
		$formBuilder = $this->createFormBuilder($user);
		
		
		$formBuilder->add ( 'nom', 'text', array (
				'label' => 'Nom',
				'required' => false 
		) )->add ( 'prenom', 'text', array (
				'label' => 'Prénom',
				'required' => false 
		) )->add ( 'username', 'text', array (
				'label' => 'Nom d\'utilisateur',
				'required' => false 
		) )->add ( 'email', 'email', array (
				'label' => 'Email ',
				'required' => false 
		) )->add ( 'ville', 'text', array (
				'label' => 'Ville ',
				'required' => false 
		) )->add ( 'codePostal', 'text', array (
				'label' => 'Code Postal  ',
				'required' => false 
		) )->add ( 'pays', 'text', array (
				'label' => 'Pays  ',
				'required' => false 
		) )->add ( 'telephonePortable', 'integer', array (
				'label' => 'Téléphone',
				'required' => false 
		) )->add ( 'Exporter', 'submit' );
		
		$form = $formBuilder->getForm();
		
		$request = $this->get('request');
		$form->handleRequest($request);
		
		if ($request->isMethod ( 'POST' )) {
									
			$usrs = $this->getDoctrine()->getRepository('GblBackOfficeBundle:User')
			->getSearch($form->getData());
			
			$handle = fopen('php://memory', 'r+');
	        $header = array();
	
	        foreach ($usrs as $usr) {
	        	
	            fputcsv($handle, array(
	            	'nom'=>$usr->getNom(),
	            	'prenom'=>$usr->getPrenom(),
	            	'username'=>$usr->getUsername(),
	            	'email'=>$usr->getEmail(),
	            	'adresse'=>$usr->getAdresse(),
	            	'ville'=>$usr->getVille(),
	            	'codePostal'=>$usr->getCodePostal(),
	            	'pays'=>$usr->getPays(),
	            	'dateNaissance'=>$usr->getDateNaissance()->format('Y-m-d H:i:s'),
	            	'Telephone'=>$usr->getTelephonePortable(),
	            ));
	        }
	
	        rewind($handle);
	        $content = stream_get_contents($handle);
	        fclose($handle);
	        
	        return new Response($content, 200, array(
	            'Content-Type' => 'application/force-download',
	            'Content-Disposition' => 'attachment; filename="export.csv"'
	        ));
			}
		
		return $this->render ( 'GblBackOfficeBundle:User:search.html.twig', array (
				'form' => $form->createView () 
		) );
	}
}
