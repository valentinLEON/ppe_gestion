<?php // src/Acme/Form/Type/ExampleForm.php

namespace Acme\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ExampleForm extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('email', 'email', array(
            'constraints' => array(
                new Assert\NotBlank(),
                new Assert\Email()
            )
        ));
        $builder->add('first_name', 'text', array(
            'constraints' => array(
                new Assert\NotBlank(),
                new Assert\Length(array('min' => 5))
            )
        ));
        $builder->add('last_name', 'text', array(
            'constraints' => array(
                new Assert\NotBlank(),
                new Assert\Length(array('min' => 5))
            )
        ));
        $builder->add('gender', 'choice', array(
            'choices' => array(1 => 'male', 2 => 'female'),
            'expanded' => true,
            'constraints' => new Assert\Choice(array(1, 2)),
        ));
        $builder->add('Save', 'submit');
    }

    public function getName()
    {
        return 'example';
    }
}