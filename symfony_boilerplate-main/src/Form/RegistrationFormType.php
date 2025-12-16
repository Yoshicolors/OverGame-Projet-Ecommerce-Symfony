<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'auth.email',
                'attr' => [
                    'placeholder' => 'auth.email',
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'auth.first_name',
                'attr' => [
                    'placeholder' => 'auth.first_name',
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'auth.last_name',
                'attr' => [
                    'placeholder' => 'auth.last_name',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'first_options' => [
                    'label' => 'auth.password',
                    'attr' => [
                        'placeholder' => 'auth.password',
                        'autocomplete' => 'new-password',
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'validation.required',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'validation.min_length',
                            'max' => 4096,
                        ]),
                    ],
                ],
                'second_options' => [
                    'label' => 'auth.confirm_password',
                    'attr' => [
                        'placeholder' => 'auth.confirm_password',
                        'autocomplete' => 'new-password',
                    ],
                ],
                'invalid_message' => 'Les mots de passe doivent correspondre.',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'J\'accepte les conditions d\'utilisation',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions.',
                    ]),
                ],
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
