<?php

namespace Apw\BlackbullBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
                $product = $event->getData();
                $form = $event->getForm();
                if(!$product || null === $product->getId()){
                    $form->add('productsModel');
                }
            })
            ->add('productsImage')
            ->add('productsPrice')
            ->add('productsDateAvailable')
            ->add('productsWeight')
            ->add('productsStatus')
            ->add('salva','submit')
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
