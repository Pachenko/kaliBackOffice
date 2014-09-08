<?php

namespace Gbl\BackOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->setMethod('POST');
    	
        $builder
           ->add('nom', 				'text')
			->add('prenom',				'text')
			->add('username',			'text')
			->add('password',			'password')
			->add('email',				'email')
			->add('adresse',			'text')
			->add('ville',				'text')
			->add('codePostal',			'text')
			->add('pays',				'text')
			->add('dateNaissance',		'date')
			->add('telephoneFixe',		'integer')
			->add('telephonePortable',	'integer');
        
        $builder->add('Ajouter', 'submit');
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
