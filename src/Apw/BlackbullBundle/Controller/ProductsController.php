<?php

namespace Apw\BlackbullBundle\Controller;

use Apw\BlackbullBundle\Entity\Categories;
use Apw\BlackbullBundle\Entity\CategoriesDescription;
use Apw\BlackbullBundle\Entity\Manufacturers;
use Apw\BlackbullBundle\Entity\ManufacturersInfo;
use Apw\BlackbullBundle\Entity\Products;
use Apw\BlackbullBundle\Entity\ProductsDescription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
    public function createProductAction()
    {

        $em = $this->getDoctrine()->getManager();
        $language = $em->getRepository('ApwBlackbullBundle:Languages')->findOneBy(array('code'=>'it'));

        $category = new Categories();
        $category->setCategoriesImage('keyboard.png');
        $category->setDateAdded(new \DateTime());
        $em->persist($category);

        $categoryDesc = new CategoriesDescription();
        $categoryDesc->setCategory($category);
        $categoryDesc->setCategoriesName('Keyboard');
        $categoryDesc->setLanguages($language);
        $em->persist($categoryDesc);

        $manufacturer= new Manufacturers();
        $manufacturer->setManufacturersName('logitech');
        $manufacturer->setManufacturersImage('logitech.png');
        $manufacturer->setDateAdded(new \DateTime());
        $em->persist($manufacturer);

        $manufacturerInfo = new ManufacturersInfo();
        $manufacturerInfo->setManufacturers($manufacturer);
        $manufacturerInfo->setManufacturersUrl('www.logitech.it');
        $manufacturerInfo->setLanguages($language);
        $em->persist($manufacturerInfo);

        $product = new Products();
        $product->setProductsModel('A32b34');
        $product->setProductsPrice(59.90);
        $product->setProductsQuantity(10);
        //$product->setProductsWeight(200);
        //$product->setProductsDateAdded(new \DateTime()); // gestito in PrePersisst
        $product->setProductsDateAvailable(new \DateTime('tomorrow'));
        $product->setManufacturers($manufacturer);
        $product->addCategory($category);
        $em->persist($product);


        $productDesc = new ProductsDescription();
        $productDesc->setProduct($product);
        $productDesc->setProductsName('Alto');
        $productDesc->setProductsDescription('ergonomic and alto pc');
        $productDesc->setLanguages($language);
        $em->persist($productDesc);

        $em->flush();

        return array(
            //
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

}
