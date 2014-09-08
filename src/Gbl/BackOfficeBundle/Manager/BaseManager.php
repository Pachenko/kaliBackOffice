<?php

namespace Gbl\BackOfficeBundle\Manager;

abstract class BaseManager
{
	protected function persistAndFlush($entity)
	{
		$this->em->persist($entity);
		$this->em->flush();
	}
}