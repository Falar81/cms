<?php

namespace Apw\BlackbullBundle\Controller;

use Apw\BlackbullBundle\Entity\Categories;
use Apw\BlackbullBundle\Entity\CategoriesDescription;
use Apw\BlackbullBundle\Entity\Manufacturers;
use Apw\BlackbullBundle\Entity\ManufacturersInfo;
use Apw\BlackbullBundle\Entity\Products;
use Apw\BlackbullBundle\Entity\ProductsDescription;
use Apw\BlackbullBundle\Form\ProductsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{
    /**
     * @Route("/showProducts")
     * @Template()
     */
    public function showProductsAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/infoProduct/{id}")
     * @Template()
     */
    public function infoProductAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product=$em->getRepository('ApwBlackbullBundle:Products')->findProductInfo($id);


        return array(
            'product'=>$product
        );    }

    /**
     * @Route("/createProduct")
     * @Template()
     */
    public function createProductAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $product=$em->getRepository('ApwBlackbullBundle:Products')->findProductInfo(3);

        $productForm = $this->createForm(new ProductsType(), $product);
        $productForm->handleRequest($request);
        if($productForm->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirect($this->generateUrl('apw_blackbull_categories_showcategories'));
        }
//        $em = $this->getDoctrine()->getManager();
//        $language = $em->getRepository('ApwBlackbullBundle:Languages')->findOneBy(array('code'=>'it'));
//        $category = $em->getRepository('ApwBlackbullBundle:Categories')->findOneById('12');
//        $category = new Categories();
//        $category->setCategoriesImage('keyboard.png');
//        $category->setDateAdded(new \DateTime());
//        $em->persist($category);
//
//        $categoryDesc = new CategoriesDescription();
//        $categoryDesc->setCategory($category);
//        $categoryDesc->setCategoriesName('Keyboard');
//        $categoryDesc->setLanguages($language);
//        $em->persist($categoryDesc);
//
//        $manufacturer= new Manufacturers();
//        $manufacturer->setManufacturersName('Logitech');
//        $manufacturer->setManufacturersImage('Logitech.png');
//        $manufacturer->setDateAdded(new \DateTime());
//        $em->persist($manufacturer);
//
//        $manufacturerInfo = new ManufacturersInfo();
//        $manufacturerInfo->setManufacturers($manufacturer);
//        $manufacturerInfo->setManufacturersUrl('www.logitech.it');
//        $manufacturerInfo->setLanguages($language);
//        $em->persist($manufacturerInfo);
//
//        $product = new Products();
//        $product->setProductsModel('A32b34');
//        $product->setProductsPrice(100.00);
//        $product->setProductsQuantity(10);
//        //$product->setProductsWeight(200);
//        //$product->setProductsDateAdded(new \DateTime()); // gestito in PrePersisst
//        $product->setProductsDateAvailable(new \DateTime('tomorrow'));
//        $product->setManufacturers($manufacturer);
//        $product->addCategory($category);
//        $em->persist($product);
//
//        $productDesc = new ProductsDescription();
//        $productDesc->setProduct($product);
//        $productDesc->setProductsName('Alto');
//        $productDesc->setProductsDescription('ergonomic and alto pc');
//        $productDesc->setLanguages($language);
//        $em->persist($productDesc);
//
//        $em->flush();

        return array(
            'form' => $productForm->createView()
        );
            //$this->redirect($this->generateUrl('apw_blackbull_products_showproducts'));
    }

    /**
     * @Route("/updateProduct")
     * @Template()
     */
    public function updateProductAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/deleteProduct")
     * @Template()
     */
    public function deleteProductAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/updProductStatus/{productId}")
     */
    public function updProductStatusAction($productId){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('ApwBlackbullBundle:Products')->find($productId);
        $product->setProductsStatus($this->get('request')->request->get('productStatus'));
        $em->persist($product);
        $em->flush();

        return $this->redirect($this->generateUrl('apw_blackbull_categories_showcategories'));

    }
}
