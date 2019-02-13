<?php

namespace GP\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UpdateCourseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('courseName', TextType::class)
            ->add('courseDescription', TextareaType::class)
            ->add('price', IntegerType::class)
            ->add('classroom', EntityType::class, array(
                'class'        => 'GPPlatformBundle:Classroom',
                'choice_label' => 'name',
                'multiple'     => true,
            ))
            //  ->add('addDate', DateTimeType::class)
            //  ->add('Soumettre',      SubmitType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GP\PlatformBundle\Entity\Course'
        ));
    }
}
