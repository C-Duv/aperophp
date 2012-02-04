<?php

namespace Aperophp\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Symfony\Component\Validator\Constraints;

/**
 * Signup form.
 *
 * @author Koin <pkoin.koin@gmail.com>
 * @since 22 janv. 2012 
 * @version 1.0 - 22 janv. 2012 - Koin <pkoin.koin@gmail.com>
 */
class SignupType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('lastname', 'text', array('label' => 'Nom', 'required' => false, 'attr' => array('placeholder' => 'Facultatif.')))
            ->add('firstname', 'text', array('label' => 'Prénom', 'required' => false, 'attr' => array('placeholder' => 'Facultatif.')))
            ->add('username', 'text', array('label' => 'Identifiant'))
            ->add('email', 'email')
            ->add('password', 'password', array('label' => 'Mot de passe'));
    }
    
    public function getDefaultOptions(array $options)
    {
        $collectionConstraint = new Constraints\Collection(array(
            'fields' => array(
                'lastname'     => new Constraints\MaxLength(array('limit' => 80)),
                'firstname'    => new Constraints\MaxLength(array('limit' => 80)),
                'username'     => array(
                    new Constraints\MaxLength(array('limit' => 80)),
                    new Constraints\NotNull(),
                ),
                'email'        => array(
                    new Constraints\Email(),
                    new Constraints\NotNull(),
                ),
                'password'     => array(
                    new Constraints\MaxLength(array('limit' => 80)),
                    new Constraints\NotNull(),
                ),
            ),
            'allowExtraFields' => false,
        ));
    
        return array('validation_constraint' => $collectionConstraint);
    }
    
    public function getName()
    {
        return 'signup';
    }
}