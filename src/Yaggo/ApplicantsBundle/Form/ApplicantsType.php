<?php

namespace Yaggo\ApplicantsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicantsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('aFirstname', TextType::class, array(
                    'label' => 'Prénom',
                    'required' => 'true'
                ))
                ->add('aLastname', TextType::class, array(
                    'label' => 'Nom',
                    'required' => 'true'
                ))
                ->add('aEmail', EmailType::class, array(
                    'label' => 'E-mail',
                    'required' => 'true'
                ))
                ->add('aPhone', TextType::class, array(
                    'label' => 'Téléphone'
                ))
                ->add('aImgUrl', TextType::class, array(
                    'label' => 'URL de l\'avatar'
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yaggo\ApplicantsBundle\Entity\Applicants'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'yaggo_applicantsbundle_applicants';
    }


}
