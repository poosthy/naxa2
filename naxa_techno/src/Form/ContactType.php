<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    private $em;

    /**
     * The Type requires the EntityManager as argument in the constructor. It is autowired
     * in Symfony 3.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('raison_sociale', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('email', EmailType::class, array('attr' => array('class' => 'form-control')))
            ->add('message', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('submit', SubmitType::class, array('attr' => array('class' => 'btn btn-danger mt-5')));

        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }

    protected function addElements(FormInterface $form, Sujet $sujet = null)
    {

        // Neighborhoods empty, unless there is a selected City (Edit View)
        $sujets = $this->em->getRepository(Sujet::class)->findAll();

        // Add the Neighborhoods field with the properly data
        $form->add('sujets', EntityType::class, array(
            'required' => true,
            'placeholder' => 'Selectionnez un sujet',
            'class' => 'AppBundle:Sujet',
            'choices' => $sujets
        ));
    }

    function onPreSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $data = $event->getData();

        // Search for selected Sujet and convert it into an Entity
        $sujet = $this->em->getRepository(Sujet::class)->find($data['nom']);

        $this->addElements($form, $sujet);
    }

    function onPreSetData(FormEvent $event)
    {
        $contact = $event->getData();
        $form = $event->getForm();

        // When you create a new contact, the Sujet is always empty
        $sujet = $contact->getSujet() ? $contact->getSujet() : null;

        $this->addElements($form, $sujet);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_contact';
    }
}
