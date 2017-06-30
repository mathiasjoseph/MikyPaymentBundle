<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/06/17
 * Time: 16:24
 */

namespace Miky\Bundle\PaymentBundle\Form\Type;


use Miky\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentMethodType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => PaymentMethodTranslationType::class,
                'label' => 'sylius.form.payment_method.name',
            ])
            ->add('position', IntegerType::class, [
                'required' => false,
                'label' => 'sylius.form.shipping_method.position',
            ])
            ->add('enabled', CheckboxType::class, [
                'required' => false,
                'label' => 'sylius.form.payment_method.enabled',
            ])
            ->addEventSubscriber(new AddCodeFormSubscriber())
        ;
    }
}