<?php

namespace Gbl\BackOfficeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Gbl\BackOfficeBundle\Repository\ConfigurationRepository;

class ConfigurationFormType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->setMethod('POST');
    	$builder->setRequired(false);
    	      
        $builder->add('panier', 'choice', array(
        		'choices' => array('1' => 'Actif', '0' => 'Inactif'),
        		'expanded' => true,
        		'multiple' => false
        ));
        
        $builder->add('theme', 'entity', array(
        		'class' => 'GblBackOfficeBundle:Theme',
        		'property' => 'titre',
        ));
        
        $builder->add('transporteurLeger', 'entity', array(
        		'class' => 'GblBackOfficeBundle:Transporteur',
        		'property' => 'nom',
        ));
        
        $builder->add('transporteurLourd', 'entity', array(
        		'class' => 'GblBackOfficeBundle:Transporteur',
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
            'data_class' => 'Gbl\BackOfficeBundle\Entity\Configuration'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gbl_backofficebundle_configuration';
    }
}
