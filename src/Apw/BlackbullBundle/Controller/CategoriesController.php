<?php

namespace Apw\BlackbullBundle\Controller;


use Apw\BlackbullBundle\Entity\Categories;
use Apw\BlackbullBundle\Entity\CategoriesDescription;
use Apw\BlackbullBundle\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class CategoriesController extends Controller
{

    /**
     * @Route("/showCategories")
     * @Template()
     */

    public function showCategoriesAction(){

        $categories = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findCategoriesJoinedDescription();

        return array(
            'categories' => $categories
        );
    }

    /**
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
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->persist($categoryDesc);
            $em->flush();
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

        return array(
            'id' => $id
        );
    }

}
