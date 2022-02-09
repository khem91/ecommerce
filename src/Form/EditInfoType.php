<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EditInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label' => 'Votre nom',
                'required' => false
            ]) 
            ->add('firstname',TextType::class,[
                'label' => 'Votre prénom',
                'required' => false
            ])    
            ->add('email',EmailType::class,[
                'label' => 'Adresse email',
                'required' => false 
            ])
            ->add('telephone',TextType::class,[
                'label' => 'Votre numéro téléphone',
                'required' => false
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
