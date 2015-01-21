<?php

namespace Apw\BlackbullBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoriesRepository extends EntityRepository
{
    public function findCategoriesJoinedProducts($id = 0){
        if($id){
            $query =
                $this->getEntityManager()
                    ->createQuery('
                SELECT c, cd, p, pd FROM ApwBlackbullBundle:Categories c
                JOIN c.categoryDescription cd
                LEFT JOIN c.products p
                LEFT JOIN p.productsDescription pd
                WHERE c.id = :id'
                    )->setParameter('id', $id);
        }else{
            $query =
                $this->getEntityManager()
                    ->createQuery('
                SELECT c, cd, p, pd FROM ApwBlackbullBundle:Categories c
                JOIN c.categoryDescription cd
                LEFT JOIN c.products p
                LEFT JOIN p.productsDescription pd
                WHERE c.parentId = :parentId
            ')->setParameter('parentId',$id);
        }

        try{
            return $query->getResult();
        }catch(\Doctrine\ORM\NoResultException $e){
            return null;
        }
    }

    public function findSubCategories($id){
        $query =
            $this->getEntityManager()
                ->createQuery('
                SELECT c, cd, p FROM ApwBlackbullBundle:Categories c
                JOIN c.categoryDescription cd
                LEFT JOIN c.products p
                WHERE c.parentId = :parentId
            ')->setParameter('parentId',$id);
        try{
            return $query->getResult();
        }catch(\Doctrine\ORM\NoResultException $e){
            return null;
        }
    }




    public function findCategoryParents($categoryId){

        $query =
            $this->getEntityManager()
                ->createQuery('
                SELECT c, cd FROM ApwBlackbullBundle:Categories c
                JOIN c.categoryDescription cd
                WHERE c.id = :categoryId
            ')->setParameter('categoryId',$categoryId);
        try{
            return $query->getResult();
        }catch(\Doctrine\ORM\NoResultException $e){
            return null;
        }
    }
}