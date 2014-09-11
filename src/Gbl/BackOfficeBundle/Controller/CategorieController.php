<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Categorie;
use Gbl\BackOfficeBundle\Form\Type\CategorieFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class CategorieController extends Controller
{
	/**
	 * @Route("/categorie", name="categorie.index")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Categorie');
		$listeCategories = $repository->findAllOrderByNom();
		
		return $this->render('GblBackOfficeBundle:Categorie:index.html.twig', array('categories' => $listeCategories));
	}
	
	/**
	 * @Route("/categorie/new", name="categorie.new")
	 * @Secure(roles="ROLE_ADMIN")
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function newAction(Request $request)
	{
		$cat = new Categorie();
		$form = $this->createForm(new CategorieFormType(), $cat);
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($cat);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
                'notice',
                'Catégorie enregistrée'
            );
			return $this->redirect($this->generateUrl('categorie.index'));
            
        } else {
            return $this->render('GblBackOfficeBundle:Categorie:new.html.twig', array(
                'form' => $form->createView(),
            )); 
        }
	}
		
	/**
	 * @Route("/categorie/edit/{id}", name="categorie.edit")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function editAction(Request $request, $id)
	{
		$cat = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Categorie')->find($id);
			
		if ($cat) {
			$form = $this->createForm(new CategorieFormType(), $cat);
		}
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($cat);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
				'notice',
				'Catégorie modifiée'
			);
			return $this->redirect($this->generateUrl('categorie.index'));
				
		} else {
			return $this->render('GblBackOfficeBundle:Categorie:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * @Route("/categorie/delete/{id}", name="categorie.delete")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function deleteAction($id)
	{
		$cat = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Categorie')->find($id);
		
		if ($cat) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($cat);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Catégorie supprimée'
			);
			return $this->redirect($this->generateUrl('categorie.index'));
		} else {
			$form = $this->createForm(new CategorieFormType(), $cat);
			return $this->redirect($this->generateUrl('categorie.index'));
		}
	}
}