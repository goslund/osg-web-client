<?php

namespace OSG\ArduinosBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArduinoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArduinoRepository extends EntityRepository
{
	public function findAllOrderedById($id) {
		$manager = $this->getEntityManager();
		$qb = $manager->createQueryBuilder();

		$qb->select('*')
		   ->from('Arduino a')
		   ->where('a.arduino_id = ?1')
		   ->setParameter(1, $id);
	}
}