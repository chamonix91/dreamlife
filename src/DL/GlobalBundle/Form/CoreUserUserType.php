<?php

namespace DL\GlobalBundle\Form;

use DL\GlobalBundle\Entity\CoreCmsPicture;
use DL\GlobalBundle\Entity\CoreCustomerAddress;
use DL\GlobalBundle\Entity\CoreUserUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoreUserUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('addressId')
            ->add('username')
            ->add('email')

            ->add('password')

            //->add('recruiterId')


         //   ->add('tmpPassword')
            ->add('firstName')
            ->add('lastName')
            ->add('phone')
            ->add('mobilePhone')
            ->add('nationality')
            ->add('addressId',CoreCustomerAddressType::class,array('data_class'=>CoreCustomerAddress::class))
            /*->add('roleLabel')

            ->add('gender')
            ->add('expired')
            ->add('locked')
            ->add('credentialsExpired')
            ->add('validateDate')
            ->add('phoneValidated')
            ->add('phoneCode')
            ->add('phoneRequestAt')
            ->add('randomKey')
            ->add('commercialName')
            ->add('birthDate')
            ->add('country')
            ->add('documentType')
            ->add('documentNumber')
            ->add('cin')
            ->add('rib')
            ->add('transferType')
            ->add('promotionCode')
            ->add('chosenTreeDirection')
            ->add('lastTreeDirection')
            ->add('siret')

            ->add('iban')
            ->add('document')
            ->add('ribDocument')
            ->add('invalidEmail')
            ->add('active')
            ->add('checkStatus')*/
            //->add('addressId',CoreCustomerAddressType::class,array('data_class'=>CoreCustomerAddress::class))
//            ->add('pictureId',CoreCmsPictureType::class,array('data_class'=>CoreCmsPicture::class))
            ;


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DL\GlobalBundle\Entity\CoreUserUser'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dl_globalbundle_coreuseruser';
    }


}
