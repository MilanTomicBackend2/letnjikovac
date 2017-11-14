<?php 
//namespace AppBundle\Form;
//
//use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolver;
//
//class MessageType extends AbstractType
//{
//    /**
//     * {@inheritdoc}
//     */
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder->add('email')->add('title')->add('text');
//    }
//    
//    /**
//     * {@inheritdoc}
//     */
//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'AppBundle\Entity\Message'
//        ));
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function getBlockPrefix()
//    {
//        return 'appbundle_message';
//    }
//
//
//}

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control  input-lg',
                    'placeholder' => 'Unesite vas email.'
                ]
            ])
            ->add('title', TextType::class, [
                'label' => 'Naslov',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Unesite naslov poruke.'
                ]
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Tekst',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false
            ])
           ->add('save', SubmitType::class, [
                'label' => 'Sačuvaj',
                'attr' => [
                    'class' => 'btn btn-default'
                ]
            ])
    
        ;
    }
}