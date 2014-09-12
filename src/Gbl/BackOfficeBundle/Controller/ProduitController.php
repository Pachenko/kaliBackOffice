<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Produit;
use Gbl\BackOfficeBundle\Form\Type\ProduitFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ProduitController extends Controller
{
	/**
	 * Affiche la liste des produits avec et sans stock
	 * 
	 * @Route("/produit", name="produit.index")
   	 * @Secure(roles="ROLE_ADMIN, ROLE_PRODUCT")
   	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Produit');
		$produits = $repository->findAllWithStock();
		$produits_notstock = $repository->findAllNotStock();
		
		return $this->render('GblBackOfficeBundle:Produit:index.html.twig', array(
				'produits' => $produits,
				'noproduits' => $produits_notstock
		));
	}
	
	/**
	 * Affiche les produits en vente flash
	 * 
	 * @Route("/produit/flash", name="produit.flash")
	 * @Secure(roles="ROLE_ADMIN, ROLE_PRODUCT")
	 */
	public function venteFlashAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Produit');
		$produits = $repository->findAllWithVenteFlashAndWithStock();
		$produits_notstock = $repository->findAllWithVenteFlashAndNotStock();
		
		return $this->render('GblBackOfficeBundle:Produit:venteFlash.html.twig', array(
				'produits' => $produits,
				'noproduits' => $produits_notstock
		));
	}
	
	/**
	 * Créer un nouveau produit
	 * 
	 * @Route("/produit/new", name="produit.new")
	 * @Secure(roles="ROLE_ADMIN, ROLE_PRODUCT")
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function newAction(Request $request)
	{
		$prod = new Produit();
		$form = $this->createForm(new ProduitFormType(), $prod);
		
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
	 * Editer un produit
	 * 
	 * @Route("/produit/edit/{id}", name="produit.edit")
	 * @Secure(roles="ROLE_ADMIN, ROLE_PRODUCT")
	 */
	public function editAction(Request $request, $id)
	{
		$prod = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Produit')->find($id);
			
		if ($prod) {
			$form = $this->createForm(new ProduitFormType(), $prod);
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
	 * Supprimer un produit
	 * 
	 * @Route("/produit/delete/{id}", name="produit.delete")
	 * @Secure(roles="ROLE_ADMIN, ROLE_PRODUCT")
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
			$form = $this->createForm(new ProduitFormType(), $prod);
			return $this->redirect($this->generateUrl('produit.index'));
		}
	}
}
