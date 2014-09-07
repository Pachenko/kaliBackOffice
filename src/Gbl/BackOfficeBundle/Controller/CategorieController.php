<?php
//http://www.flaticon.com/packs/ memo

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Gbl\BackOfficeBundle\Entity\Categorie;
use Gbl\BackOfficeBundle\Form\CategorieType;

class CategorieController extends Controller
{
	/**
	 * @Route("/categorie/index", name="categorie.index")
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('GblBackOfficeBundle:Categorie');
		$listeCategories = $repository->findAll();
		
		return $this->render('GblBackOfficeBundle:Categorie:index.html.twig', array('categories' => $listeCategories));
	}
	
	/**
	 * @Route("/categorie/new", name="categorie.new")
	 * 
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function newAction(Request $request)
	{
		$cat = new Categorie();
		$form = $this->createForm(new CategorieType(), $cat);
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($cat);
			$em->flush();
// 			$this->get('session')->getFlashBag()->add(
//                 'notice',
//                 'Catégorie ajoutée'
//             );
			return $this->redirect($this->generateUrl('categorie.index'));
            
        } else {
            return $this->render('GblBackOfficeBundle:Categorie:new.html.twig', array(
                'form' => $form->createView(),
            )); 
        }
	}
	
	public function viewAction()
	{
		
	}
	
	public function editAction()
	{
		
	}
}