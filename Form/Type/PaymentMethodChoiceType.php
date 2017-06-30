<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/06/17
 * Time: 16:30
 */

namespace Miky\Bundle\PaymentBundle\Form\Type;


use Symfony\Component\Form\AbstractType;

class PaymentMethodChoiceType extends AbstractType
{
    /**
     * @var PaymentMethodsResolverInterface
     */
    private $paymentMethodsResolver;
    /**
     * @var RepositoryInterface
     */
    private $paymentMethodRepository;
    /**
     * @param PaymentMethodsResolverInterface $paymentMethodsResolver
     * @param RepositoryInterface $paymentMethodRepository
     */
    public function __construct(
        PaymentMethodsResolverInterface $paymentMethodsResolver,
        RepositoryInterface $paymentMethodRepository
    ) {
        $this->paymentMethodsResolver = $paymentMethodsResolver;
        $this->paymentMethodRepository = $paymentMethodRepository;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['multiple']) {
            $builder->addModelTransformer(new CollectionToArrayTransformer());
        }
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'choices' => function (Options $options) {
                    if (isset($options['subject'])) {
                        return $this->paymentMethodsResolver->getSupportedMethods($options['subject']);
                    }
                    return $this->paymentMethodRepository->findAll();
                },
                'choice_value' => 'code',
                'choice_label' => 'name',
                'choice_translation_domain' => false,
            ])
            ->setDefined([
                'subject',
            ])
            ->setAllowedTypes('subject', PaymentInterface::class)
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return ChoiceType::class;
    }
}