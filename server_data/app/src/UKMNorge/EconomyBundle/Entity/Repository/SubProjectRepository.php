<?php

namespace UKMNorge\EconomyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SubProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SubProjectRepository extends EntityRepository
{
	public function findAll() {
		return $this->findBy(array(), array('name' => 'ASC'));
	}
}
