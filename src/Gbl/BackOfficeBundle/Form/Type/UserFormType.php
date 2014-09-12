<?php

namespace Gbl\BackOfficeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserFormType extends AbstractType
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
            ->add('nom', 				'text')
			->add('prenom',				'text')
			->add('username',			'text')
			->add('password',			'password')
			->add('email',				'email')
          	->add('roles', 'choice', 
          		array(
          			'choices' => 
		                array(
		                    'ROLE_PRODUCT' => 'ROLE_PRODUCT',
		                    'ROLE_CLIENT'  => 'ROLE_CLIENT',
		                    'ROLE_POWER'   => 'ROLE_POWER',
		                ),
		                'required'  => true,
		                'multiple'  => true
            ));
        
        $builder->add('Ajouter', 'submit');
        
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
            'data_class' => 'Gbl\BackOfficeBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gbl_backofficebundle_user';
    }
}
