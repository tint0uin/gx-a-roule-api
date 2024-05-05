<?php

namespace App\Form;

use App\Entity\Meme;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\CallbackTransformer;
use App\Service\TagService;


class MemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', null, [
                'constraints' =>  new NotBlank ([
                    'message' => 'ce champ ne peut pas être vide'
                ])
            ])
            ->add('tag', null, array('mapped' => false,
             'constraints' =>  new NotBlank ([
                'message' => 'ce champ ne peut pas être vide'])
                ))
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Meme::class,
        ]);
    }
}
