<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DatabaseController extends Controller
{
    /**
     * @Route("/database")
     */
    public function indexAction()
    {
    	
    	// $formBuilder = 
    	
        return $this->render('GblBackOfficeBundle:DataBase:index.html.twig');
    }
}
