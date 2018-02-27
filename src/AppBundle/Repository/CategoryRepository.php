<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Category;
use Doctrine\ORM\EntityManager; 

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
 	public function addCategory($name)
    {
        $em = $this->getEntityManager();
        $category = new Category();
        $category->setName($name);

        $em->persist($category);
		$em->flush();

		$result = array(
			'id'=>$category->getId(),
			'name'=>$category->getName(),
		);
		return $result;
    } 
    	
    public function getCategories()
    {
        $data = [];
        $qb = $this->createQueryBuilder('c');
        $categories = $qb->getQuery()->getResult();

        foreach ($categories as $key => $categorie){
                $data[] = array(
                    'id' => $categorie->getId(),
                    'name'=>$categorie->getName()  
                );
        }

        return $data;
    }
}
