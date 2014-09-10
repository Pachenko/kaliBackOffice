<?php

namespace Gbl\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ConfigurationController extends Controller
{
	/**
	 * @Route("/configuration", name="configuration.index")
	 * @Template()
	 * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
	 */
	public function indexAction()
	{
		return array();
	}
}