<?php
/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FOS\UserBundle\Form\Type;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ProfileFormType extends AbstractType
{
    /**
     * @var string
     */
    private $class;
    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->buildUserForm($builder, $options);
        $constraintsOptions = array(
            'message' => 'Contrasenya incorrecte',
        );
        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = array(reset($options['validation_groups']));
        }
        $builder->add('current_password', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'), array(
            'label' => 'Contrasenya',
            'attr' => ['class' =>"form-control"],
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => new UserPassword($constraintsOptions),
        ));
        
        // $this->addRolesToForm($builder); // COMENTAR PK NO PUGUI EL PROPI USUARI CANVIAR EL ROL
        
    }
    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addRolesToForm(FormBuilderInterface $builder){
        return $builder->add('roles', ChoiceType::class, array('label' => 'Rol', 
            'attr' => ['class' => 'form-control'],
            'required' => true, 'choices' => array("Administrador" => 'ROLE_ADMIN', "Usuari" => 'ROLE_USER', "Traductor" => 'ROLE_TRANS'), 'multiple' => true));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'profile',
            // BC for SF < 2.8
            'intention' => 'profile',
        ));
    }
    // BC for SF < 3.0
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fos_user_profile';
    }
    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username','attr'=>['class' => 'form-control'], 'translation_domain' => 'FOSUserBundle'))
            ->add('cognom', null, array('label' => 'form.cognom', 'attr'=>['class' => 'form-control'],  'translation_domain' => 'FOSUserBundle'))
            ->add('dni', null, array('label' => 'form.dni', 'attr'=>['class' => 'form-control'],  'translation_domain' => 'FOSUserBundle'))
            ->add('image', null, array('label' => 'form.image','attr'=>['class' => 'form-control'], 'translation_domain' => 'FOSUserBundle'))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email','attr'=>['class' => 'form-control'], 'translation_domain' => 'FOSUserBundle'))
        ;
    }
}
