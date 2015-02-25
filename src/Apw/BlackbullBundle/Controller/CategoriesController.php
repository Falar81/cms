<?php

namespace Apw\BlackbullBundle\Controller;


use Apw\BlackbullBundle\Entity\Categories;
use Apw\BlackbullBundle\Entity\CategoriesDescription;
use Apw\BlackbullBundle\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CategoriesController extends Controller
{

    /**
     * @Route("/showCategories/{id}", defaults={"id" = 0})
     * @Template()
     */

    public function showCategoriesAction($id){

        if($id){

            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('ApwBlackbullBundle:Categories')->find($id);
            $childCategories = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findChildCategoriesJoinedProducts($id);

            return array(
                'childCategories' => $childCategories,
                'category' => $category,
            );
        }

        $categories = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findChildCategoriesJoinedProducts($id);

        return array(
            'childCategories' => $categories,
        );
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/createCategory")
     * @Template()
     */

    public function createCategoryAction(Request $request){

        $category = new Categories();
        $categoryDesc = new CategoriesDescription();
        $category->addCategoryDescription($categoryDesc);
        $categoryDesc->setCategory($category);

        $form = $this->createForm(new CategoriesType(), $category);
        $form->handleRequest($request);

        if($form->isValid()){
            //exit(\Doctrine\Common\Util\Debug::dump($category));
            $em = $this->getDoctrine()->getManager();
            if(!$category->getParentId()){
                $category->setParentId(0);
            }
            $em->persist($category);
            $em->persist($categoryDesc);
            $em->flush();

            return $this->redirect($this->generateUrl('apw_blackbull_categories_showcategories'));
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/deleteCategory/{id}")
     * @Template()
     */
    public function deleteCategoryAction($id){

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('ApwBlackbullBundle:Categories')->find($id);

        $em->remove($category);
        $em->flush();

        return $this->redirect($this->generateUrl('apw_blackbull_categories_showcategories'));
    }

    /**
     * @Route("/listCategoryToMove/{id}", options={"expose"=true})
     */
    public function listCategoryToMoveAction($id){

        $em = $this->getDoctrine()->getManager();
        $categoryNameToMove = $em->getRepository('ApwBlackbullBundle:Categories')->findOneBy(array('id'=>$id));
        $categoriesList = $em->getRepository('ApwBlackbullBundle:Categories')->listCategoriesToMove($id);

        foreach($categoriesList as $category){
            foreach($category->getCategoryDescription() as $categoryName){
                $categoriesName[$category->getId()][] = $categoryName->getCategoriesName();
            }
        }

        foreach($categoryNameToMove->getCategoryDescription() as $categoryToMove){
            $categoryDescName[] = $categoryToMove->getCategoriesName();
        }

        $response = new JsonResponse();
        return $response->setData(array('categoriesName' => $categoriesName, 'categoryNameToMove' => $categoryDescName));
    }

    /**
     * @Route("/updCategoryStatus/{categoryId}")
     */
    public function updCategoryStatusAction($categoryId){
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('ApwBlackbullBundle:Categories')->find($categoryId);
        $category->setCategoriesStatus($this->get('request')->request->get('categoryStatus'));
        $em->persist($category);
        $em->flush();

        return $this->redirect($this->generateUrl('apw_blackbull_categories_showcategories'));
    }

    /**
     * @Route("/moveCategory/{fromId}/{toId}", options={"expose"=true})
     */
    public function moveCategoryAction($fromId, $toId){

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('ApwBlackbullBundle:Categories')->find($fromId);
        $category->setParentId($toId);
        $em->persist($category);
        $em->flush();

        return $this->redirect($this->generateUrl('apw_blackbull_categories_showcategories'));
    }

}
