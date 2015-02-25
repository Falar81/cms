<?php

namespace Apw\BlackbullBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoryDescription', 'collection',
                array(
                    'type' => new CategoriesDescriptionType(),
                    'allow_add' => true,
                    'options' => array('data_class' => 'Apw\BlackbullBundle\Entity\CategoriesDescription'),
                    'by_reference' => false,
                ))
            ->add('categoriesImage', null, array('label'=>'Foto:'))
            ->add('categoriesStatus', null, array('label'=>'Stato:'))
            ->add('parentId', 'entity', array(
                                            'class'       => 'ApwBlackbullBundle:CategoriesDescription',
                                            'property'    => 'categoriesName',
                                            'empty_value' => 'Scegliere una categoria',
                                            'required'    => false,
                                            'label'       => 'Crea in:'))
            ->add('salva','submit')
            ->add('azzera','reset')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apw\BlackbullBundle\Entity\Categories',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'categories';
    }
}
