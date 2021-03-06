<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Transporteur;
use Gbl\BackOfficeBundle\Form\Type\TransporteurFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class TransporteurController extends Controller
{
	/**
	 * Affiche la liste des transporteurs
	 * 
	 * @Route("/transporteur", name="transporteur.index")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Transporteur');
		$listeTransporteurs = $repository->findAll();
		
		return $this->render('GblBackOfficeBundle:Transporteur:index.html.twig', array('transporteurs' => $listeTransporteurs));
	}
	
	/**
	 * Ajout un transporteur
	 * 
	 * @Route("/transporteur/new", name="transporteur.new")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function newAction(Request $request)
	{
		$tp = new Transporteur();
		$form = $this->createForm(new TransporteurFormType(), $tp);
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($tp);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Transporteur enregistré'
			);
			return $this->redirect($this->generateUrl('transporteur.index'));
		
		} else {
			return $this->render('GblBackOfficeBundle:Transporteur:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * Editer un transporteur
	 * 
	 * @Route("/transporteur/edit/{id}", name="transporteur.edit")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
	 */
	public function editAction(Request $request, $id)
	{
		$tp = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Transporteur')->find($id);
			
		if ($tp) {
			$form = $this->createForm(new TransporteurFormType(), $tp);
		}
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($tp);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Transporteur modifié'
			);
			return $this->redirect($this->generateUrl('transporteur.index'));
		
		} else {
			return $this->render('GblBackOfficeBundle:Transporteur:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * Supprimer un transporteur
	 * 
	 * @Route("/transporteur/delete/{id}", name="transporteur.delete")
	 * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
	 */
	public function deleteAction($id)
	{
		$tp = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Transporteur')->find($id);
		
		if ($tp) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($tp);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Transporteur supprimée'
			);
			return $this->redirect($this->generateUrl('transporteur.index'));
		} else {
			return $this->redirect($this->generateUrl('transporteur.index'));
		}
	}
}