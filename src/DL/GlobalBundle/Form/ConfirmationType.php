<?php
/**
 * Created by PhpStorm.
 * User: chamseddin
 * Date: 02/11/2017
 * Time: 04:31
 */

namespace DL\GlobalBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ConfirmationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder

            ->add('documentFile',FileType::class)
            ->add('ribDocumentFile',FileType::class)




        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'GlobalBundle\Entity\CoreUserUser'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dl_globalbundle_confirmation';
    }

}