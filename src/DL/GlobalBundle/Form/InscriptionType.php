<?php
/**
 * Created by PhpStorm.
 * User: chamseddin
 * Date: 24/10/2017
 * Time: 14:08
 */

namespace DL\GlobalBundle\Form;


use DL\GlobalBundle\Entity\CoreCustomerAddress;
use DL\GlobalBundle\Entity\CoreUserUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class InscriptionType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder
            ->add('adresse', AdresseType::class,array(
                'data_class' => CoreCustomerAddress::class))

            ->add('Utilisateur', CoreUserUserType::class,array(
                'data_class' => CoreUserUser::class))
            ->getForm()

        ;
    }

    public function getName()
    {
        return 'user';
    }


}