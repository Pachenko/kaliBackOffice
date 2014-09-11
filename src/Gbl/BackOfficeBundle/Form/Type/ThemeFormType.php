<?php

namespace Gbl\BackOfficeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ThemeFormType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->setMethod('POST');
    	
    	$builder->add('logoUpload','file');
    	
        $builder
            ->add('slogan',	'text')
            ->add('titre',	'text')
        ;
        $builder->add('sliderFirstUpload','file');
        $builder->add('urlSliderFirst',	'text');
        
        $builder->add('sliderSecondUpload','file');
        $builder->add('urlSliderSecond',	'text');
        
        $builder->add('sliderThirdUpload','file');
        $builder->add('urlSliderThird',	'text');
        
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
            'data_class' => 'Gbl\BackOfficeBundle\Entity\Theme'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gbl_backofficebundle_theme';
    }
}
