<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Promotion;
use Gbl\BackOfficeBundle\Form\Type\PromotionFormType;
use JMS\SecurityExtraBundle\Annotation\Secure;


class PromotionController extends Controller
{
	/**
	 * @Route("/promotion/index", name="promotion.index")
	 *  
   	 * @Secure(roles="ROLE_CLIENT, ROLE_ADMIN")
   	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Promotion');
		$listepromotions = $repository->findAllNotExpired();
		$listepromotionsexpired = $repository->findAllExpired();
		
		return $this->render('GblBackOfficeBundle:Promotion:index.html.twig', array(
				'promotions' => $listepromotions,
				'promotionsexpired' => $listepromotionsexpired,
		));
	}
	
	/**
	 * @Route("/promotion/new", name="promotion.new")
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function newAction(Request $request)
	{
		$pt = new Promotion();
		$form = $this->createForm(new PromotionFormType(), $pt);
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {		
			$em = $this->getDoctrine()->getManager();
			$em->persist($pt);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
                'notice',
                'Promotion enregistrée'
            );
			return $this->redirect($this->generateUrl('promotion.index'));
            
        } else {
            return $this->render('GblBackOfficeBundle:Promotion:new.html.twig', array(
                'form' => $form->createView(),
            )); 
        }
	}
		
	/**
	 * @Route("/promotion/edit/{id}", name="promotion.edit")
	 */
	public function editAction(Request $request, $id)
	{
		$pt = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Promotion')->find($id);
			
		if ($pt) {
			$form = $this->createForm(new PromotionFormType(), $pt);
		}
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($pt);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
				'notice',
				'Promotion modifiée'
			);
			return $this->redirect($this->generateUrl('promotion.index'));
				
		} else {
			return $this->render('GblBackOfficeBundle:Promotion:new.html.twig', array(
					'form' => $form->createView(),
			));
		}
	}
	
	/**
	 * @Route("/promotion/delete/{id}", name="promotion.delete")
	 */
	public function deleteAction($id)
	{
		$pt = $this->getDoctrine()->getRepository('GblBackOfficeBundle:Promotion')->find($id);
		
		if ($pt) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($pt);
			$em->flush();
			$this->get('session')->getFlashBag()->add(
					'notice',
					'Promotion supprimée'
			);
			return $this->redirect($this->generateUrl('promotion.index'));
		} else {
			$form = $this->createForm(new PromotionFormType(), $pt);
			return $this->redirect($this->generateUrl('promotion.index'));
		}
	}
}
