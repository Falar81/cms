<?php

namespace Apw\BlackbullBundle\Controller;


use Apw\BlackbullBundle\Entity\Categories;
use Apw\BlackbullBundle\Entity\CategoriesDescription;
use Apw\BlackbullBundle\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CategoriesController extends Controller
{

    /**
     * @Route("/showCategory/{id}")
     * @Template()
     */

    public function showCategoryAction($id){

        //query prodotti
        $categoryProducts = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findCategoriesJoinedProducts($id);
        //query sottoCategorie
        $subCategories = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findSubCategories($id);

        return array(
            'categoryProducts' => $categoryProducts,
            'subCategories'    => $subCategories
        );
    }

    /**
     * @Route("/showCategories")
     * @Template()
     */

    public function showCategoriesAction(){

        $categories = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findCategoriesJoinedProducts();


        return array(
            'categories' => $categories
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
            $em = $this->getDoctrine()->getManager();
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
     * @Template()
     */
    public function getCategoryParentsAction($categoryId){

        $categories = $this->getDoctrine()->getRepository('ApwBlackbullBundle:Categories')->findCategoryParents($categoryId);

//        foreach($categories as $category){
//
//                $category->getParentId()
//        }
        return array(
            'categoryParents' => $categories,
        );
    }

    /**
     * @Route("/moveCategory/{id}")
     * @Template()
     */
    public function moveCategoryAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('ApwBlackbullBundle:Categories')->findCategoriesJoinedProducts($id);

        return array(
            'category' => $category,
        );
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

    }
