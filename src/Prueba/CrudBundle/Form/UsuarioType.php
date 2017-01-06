<?php

namespace Prueba\CrudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre',TextType::class,array(
            'label'=>'Nombre',
            'attr'=>array('class'=>'form-control',),))
        ->add('apePaterno',TextType::class,array(
            'label'=>'Apellido Paterno',
            'attr'=>array('class'=>'form-control',),))
        ->add('apeMaterno',TextType::class,array(
            'label'=>'Apellido Materno',
            'attr'=>array('class'=>'form-control',),))
        ->add('edad',TextType::class,array(
            'label'=>'Edad',
            'attr'=>array('class'=>'form-control',),))
        ->add('direccion',EntityType::class,array(
            'class'=>'PruebaCrudBundle:Direccion',
            'attr'=>array('class'=>'form-control',),
            'query_builder' => function (EntityRepository $er) {
                                return $er->createQueryBuilder('u')
                                ->orderBy('u.id', 'ASC');
                                },
            'choice_label' => 'id',))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prueba\CrudBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'prueba_crudbundle_usuario';
    }


}
