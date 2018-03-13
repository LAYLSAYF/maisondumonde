<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Products;
use AppBundle\Entity\Prices;
use AppBundle\Entity\Category;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VisiteursRepository extends EntityRepository
{
	public function myFindAll(){

		// First Method
		/*$qb = $this->_em->createQueryBuilder()
		           ->select('v')
		           ->form($this->_entityName, 'v');*/

		// Second Method 
		$rst = $this->createQueryBuilder('v')
		           ->getQuery()
		           ->getResult();
		return $rst;

	}

	public function myFindTwo($users){

		$qb = $this->_em->createQueryBuilder()
		$qb->select('v', 'u')
		   ->from('AppBundle\Entity\Visiteurs', 'v')
		   ->leftJoin('v.user', 'u')
           ->where('u = :user')
           ->setParameter('user', $users)
        return $qb->getQuery()->getResult();

	}
}