<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/06/17
 * Time: 16:29
 */

namespace Miky\Bundle\PaymentBundle\Form\Type;


use Miky\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Miky\Component\Payment\Model\PaymentInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('method', PaymentMethodChoiceType::class, [
                'label' => 'sylius.form.payment.method',
            ])
            ->add('amount', MoneyType::class, [
                'label' => 'sylius.form.payment.amount',
            ])
            ->add('state', ChoiceType::class, [
                'choices' => [
                    'sylius.form.payment.state.processing' => PaymentInterface::STATE_PROCESSING,
                    'sylius.form.payment.state.failed' => PaymentInterface::STATE_FAILED,
                    'sylius.form.payment.state.completed' => PaymentInterface::STATE_COMPLETED,
                    'sylius.form.payment.state.new' => PaymentInterface::STATE_NEW,
                    'sylius.form.payment.state.cancelled' => PaymentInterface::STATE_CANCELLED,
                    'sylius.form.payment.state.refunded' => PaymentInterface::STATE_REFUNDED,
                ],
                'label' => 'sylius.form.payment.state.header',
            ])
        ;
    }

}