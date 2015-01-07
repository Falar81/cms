<?php

namespace Apw\BlackbullBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productsQuantity')
            ->add('productsModel')
            ->add('productsImage')
            ->add('productsPrice')
            ->add('productsDateAdded')
            ->add('productsLastModified')
            ->add('productsDateAvailable')
            ->add('productsWeight')
            ->add('productsStatus')
            ->add('productsOrdered')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apw\BlackbullBundle\Entity\Products'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apw_blackbullbundle_products';
    }
}
