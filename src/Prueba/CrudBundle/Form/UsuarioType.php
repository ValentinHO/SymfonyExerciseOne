<?php

namespace Prueba\CrudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre')
        ->add('apePaterno')
        ->add('apeMaterno')
        ->add('edad')
        ->add('direccion',EntityType::class,array(
            'class'=>'PruebaCrudBundle:Direccion',
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
