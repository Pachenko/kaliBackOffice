<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DatabaseController extends Controller
{
    /**
     * @Route("/database")
     * @Secure(roles="ROLE_ADMIN, ROLE_POWER")
     */
    public function indexAction()
    {
    	
    	// $formBuilder = 
    	
        return $this->render('GblBackOfficeBundle:DataBase:index.html.twig');
    }
}
