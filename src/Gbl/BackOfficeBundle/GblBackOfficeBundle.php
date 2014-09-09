<?php

namespace Gbl\BackOfficeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GblBackOfficeBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
