<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/06/17
 * Time: 16:21
 */

namespace Miky\Bundle\PaymentBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentGatewayChoiceType extends AbstractType
{
    /**
     * @var array
     */
    private $gateways;

    /**
     * @param array $gateways
     */
    public function __construct(array $gateways)
    {
        $this->gateways = $gateways;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'choices' => array_flip($this->gateways),
            ])
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