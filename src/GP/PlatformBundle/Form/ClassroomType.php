<?php

namespace GP\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use GP\PlatformBundle\Entity\Sector;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClassroomType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groupName', TextType::class, [
                'required'   => false
            ])
            ->add('level', IntegerType::class)
            ->add('sector', EntityType::class, [
                // looks for choices from this entity
                'class' => Sector::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'sectorName',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            //->add('addDate', DateTimeType::class)
          //  ->add('Soumettre',      SubmitType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GP\PlatformBundle\Entity\Classroom'
        ));
    }
}
