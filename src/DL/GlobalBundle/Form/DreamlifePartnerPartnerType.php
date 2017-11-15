<?php

namespace DL\GlobalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DreamlifePartnerPartnerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('userUid')->add('treeParentId')->add('enrollerId')->add('packId')->add('deleted')->add('deletedAt')->add('createdAt')->add('updatedAt')->add('packCode')->add('validateDateForUser')->add('code')->add('treeDepth')->add('treePosition')->add('parentCode')->add('qualification')->add('isPlaced');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DL\GlobalBundle\Entity\DreamlifePartnerPartner'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dl_globalbundle_dreamlifepartnerpartner';
    }


}
