<?php
/**
 * Created by PhpStorm.
 * User: chamseddin
 * Date: 29/10/2017
 * Time: 19:06
 */

namespace DL\GlobalBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class CommanderType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder



            //->add('createdAt',HiddenType::class)
        //->add('save',SubmitType::class)


        ;
    }


    public function setDefaultOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'GlobalBundle\Entity\DreamlifePartnerSale'
        ));
    }

}