<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 23/02/2016
 * Time: 10:20
 */

namespace ppe_gestion\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class addNoteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', 'textarea');
    }

    public function getName()
    {
        return 'comment';
    }
}