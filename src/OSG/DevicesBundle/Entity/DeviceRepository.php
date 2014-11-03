<?php

namespace OSG\DevicesBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DeviceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DeviceRepository extends EntityRepository
{
	public function findAllByArduinoId($id) {
		$manager = $this->getEntityManager();
		$qb = $manager->createQueryBuilder();

		$qb->select('*')
		   ->from('Device','d')
		   ->where('a.arduino_id = ?1')
		   ->setParameter(1, $id);
	}
}