<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Theme;
use Gbl\BackOfficeBundle\Form\Type\ThemeFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ThemeController extends Controller
{
	/**
	 * @Route("/theme", name="theme.index")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Theme');
		$listethemes = $repository->findAll();
		
		return $this->render('GblBackOfficeBundle:Theme:index.html.twig', array('themes' => $listethemes));
	}
	
	/**
	 * @Route("/theme/new", name="theme.new")
	 * @Secure(roles="ROLE_ADMIN")
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function newAction(Request $request)
	{
		$id = $this->getUser()->getId();
		
		$repository = $this->getDoctrine()->getRepository('GblBackOfficeBundle:User');
		$user = $repository->find($id);
		
		$th = new Theme();
		$th->setUser($user);
		$form = $this->createForm(new ThemeFormType(), $th);
	
		$form->handleRequest($request);
	
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($th);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Thème enregistré'
			);
			return $this->redirect($this->generateUrl('theme.index'));
	
		} else {
			return $this->render('GblBackOfficeBundle:Theme:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * @Route("/theme/edit/{id}", name="theme.edit")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function editAction(Request $request, $id)
	{
		$th = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Theme')->find($id);
			
		if ($th) {
			$form = $this->createForm(new ThemeFormType(), $th);
		}
	
		$form->handleRequest($request);
	
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($th);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Thème modifié'
			);
			return $this->redirect($this->generateUrl('theme.index'));
	
		} else {
			return $this->render('GblBackOfficeBundle:Theme:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}	
	
	/**
	 * @Route("/theme/delete/{id}", name="theme.delete")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function deleteAction($id)
	{
		$th = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Theme')->find($id);
	
		if ($th) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($th);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Thème supprimé'
			);
			return $this->redirect($this->generateUrl('theme.index'));
		} else {
			$form = $this->createForm(new ThemeFormType(), $th);
			return $this->redirect($this->generateUrl('theme.index'));
		}
	}
}
