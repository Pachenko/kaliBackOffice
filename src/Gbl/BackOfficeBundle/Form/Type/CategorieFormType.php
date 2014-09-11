<?php

namespace Gbl\BackOfficeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategorieFormType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->setMethod('POST');
    	$builder->setRequired(false);
    	
        $builder
            ->add('nom',		 		'text')
            ->add('description',		'text')
        ;
        
        $builder->add('Enregistrer', 'submit');
        $builder->add('Retour', 'button', array(
        		'attr' => array('onClick' => 'javascript:history.go(-1)'),
        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gbl\BackOfficeBundle\Entity\Categorie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gbl_backofficebundle_categorie';
    }
}
