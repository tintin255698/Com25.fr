<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => 'Prénom', 'label_attr' => [
                'class' => 'typ',
            ],
            ])
            ->add('name', TextType::class, ['label' => 'Nom',   'label_attr' => [
                'class' => 'typ',
            ],])
            ->add('business', TextType::class, ['label' => '<span> Votre entreprise<p class="position-absolute end-50 badge rounded-pill bg-danger">Facultatif</p></span>','label_html'=>true, 'required' => false,   'label_attr' => [
                'class' => 'typ',
            ],])
            ->add('email', EmailType::class, ['label' => 'Votre email',   'label_attr' => [
                'class' => 'typ',
            ],] )
            ->add('telephone', TelType::class, ['label' => 'Votre télephone',   'label_attr' => [
                'class' => 'typ',
            ],])
            ->add('sujet', TextType::class, ['label' => 'Sujet du message',   'label_attr' => [
                'class' => 'typ',
            ],])
            ->add('contenu', TextareaType::class, ['label' => 'Le contenu de votre message',   'label_attr' => [
                'class' => 'typ',
            ],  'attr'=>['maxlength' => 1000] ])
            ->add('Envoyer', SubmitType::class, )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
