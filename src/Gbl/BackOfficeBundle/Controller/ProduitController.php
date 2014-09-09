<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Produit;
use Gbl\BackOfficeBundle\Form\ProduitType;
use JMS\SecurityExtraBundle\Annotation\Secure;


class ProduitController extends Controller
{
	/**
	 * @Route("/produit/index", name="produit.index")
	 *  
   	 * @Secure(roles="ROLE_CLIENT")
   	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Produit');
		$listeproduits = $repository->findAll();
		
		return $this->render('GblBackOfficeBundle:Produit:index.html.twig', array('produits' => $listeproduits));
	}
	
	/**
	 * @Route("/produit/new", name="produit.new")
	 * 
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function newAction(Request $request)
	{
		$prod = new produit();
		$form = $this->createForm(new ProduitType(), $prod);
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {		
			$em = $this->getDoctrine()->getManager();
			$em->persist($prod);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
                'notice',
                'Produit enregistrée'
            );
			return $this->redirect($this->generateUrl('produit.index'));
            
        } else {
            return $this->render('GblBackOfficeBundle:Produit:new.html.twig', array(
                'form' => $form->createView(),
            )); 
        }
	}
		
	/**
	 * @Route("/produit/edit/{id}", name="produit.edit")
	 */
	public function editAction(Request $request, $id)
	{
		$prod = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Produit')->find($id);
			
		if ($prod) {
			$form = $this->createForm(new ProduitType(), $prod);
		}
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($prod);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
				'notice',
				'Produit modifiée'
			);
			return $this->redirect($this->generateUrl('produit.index'));
				
		} else {
			return $this->render('GblBackOfficeBundle:Produit:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * @Route("/produit/delete/{id}", name="produit.delete")
	 */
	public function deleteAction($id)
	{
		$prod = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Produit')->find($id);
		
		if ($prod) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($prod);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Produit supprimée'
			);
			return $this->redirect($this->generateUrl('produit.index'));
		} else {
			$form = $this->createForm(new ProduitType(), $prod);
			return $this->redirect($this->generateUrl('produit.index'));
		}
	}
}
