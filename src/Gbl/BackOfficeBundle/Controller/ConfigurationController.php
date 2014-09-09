<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ConfigurationController extends Controller 
{
	/**
	 * Route("/configuration", name="configuration.index")
	 * Template()
	 */
	public function indexAction()
	{
		return array();
	}
}