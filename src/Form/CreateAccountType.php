<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username' , TextType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Username"],
                'label' => false,
            ])

            ->add('firstname', TextType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Prénom"],
                'label' => false,
                'required' => true,])

            ->add('lastname', TextType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Nom"],
                'label' => false,
                'required' => true,])

            ->add('password', RepeatedType::class, [
                'options' => ['attr' => ['class' => 'password-field']],
                'label' => false,
                'type' => PasswordType::class,
                'required' => true,
                'invalid_message' => 'The password fields must match.',
                'first_options'  => [
                    'attr'=> ['class'=> 'form-control',"placeholder"=>"MDP"],"label"=>false],
                'second_options' => [
                    'attr'=> ['class'=> 'form-control',"placeholder"=>"Repeat MDP"],"label"=>false,],
            ])

            ->add('adresse', TextType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Adresse"],
                'label' => false,
                'required' => true,])
            ->add('city', TextType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Adresse"],
                'label' => false,
                'required' => true,])

            ->add('postalcode', IntegerType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Code Postal "],
                'label' => false,
                'required' => true,] )

            ->add('profilimage',FileType::class,[
                //'attr' =>['class'=> 'form-control'],
                'help' => 'select a image',
                'label' => false,
                'mapped' => false,
                'required' => true,]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
