<?php

namespace Gbl\BackOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->setMethod('POST');
    	
        $builder
            ->add('nom',		 	'text')
            ->add('reference',		'text')
            ->add('description',	'text')
            ->add('prix', 			'number')
            ->add('poids', 			'number')
            ->add('dimensions', 	'text')
            ->add('stock', 			'number')
        ;
        
        $builder->add('venteFlash', 'choice', array(
        		'choices' => array('1' => 'Oui', '0' => 'Non'),
        		'expanded' => true,
        		'multiple' => false,
        		'data' => '0'
        ));
        
        $builder->add('categorie', 'entity', array(
        		'class' => 'GblBackOfficeBundle:Categorie',
        		'multiple' => false,
        		'property' => 'nom',
        ));
        
        $builder->add('Enregistrer', 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gbl\BackOfficeBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gbl_backofficebundle_produit';
    }
}
