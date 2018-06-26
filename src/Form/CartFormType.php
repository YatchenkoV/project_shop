<?php

namespace App\Form;


use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CartFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('quantity', IntegerType::class, array('attr' => array('value' => 1)))
           ->add('id', HiddenType::class)
           ->add('buy', SubmitType::class, array('label' => 'BUY'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }
}