<?php

namespace Prueba\CrudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DireccionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('calle',TextType::class,array(
            'label'=>'Calle',
            'attr'=>array('class'=>'form-control',),))
        ->add('colonia',TextType::class,array(
            'label'=>'Colonia',
            'attr'=>array('class'=>'form-control',),))
        ->add('delegacion',TextType::class,array(
            'label'=>'Delegación',
            'attr'=>array('class'=>'form-control',),))
        ->add('numero',TextType::class,array(
            'label'=>'Número',
            'attr'=>array('class'=>'form-control',),))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prueba\CrudBundle\Entity\Direccion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'prueba_crudbundle_direccion';
    }


}
