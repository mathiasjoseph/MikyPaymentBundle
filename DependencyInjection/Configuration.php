<?php

namespace Miky\Bundle\PaymentBundle\DependencyInjection;

use Miky\Bundle\PaymentBundle\Doctrine\Entity\Payment;
use Miky\Bundle\PaymentBundle\Doctrine\Entity\PaymentMethod;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    private $useDefaultEntities;

    /**
     * Configuration constructor.
     */
    public function __construct($useDefaultEntities)
    {
        $this->useDefaultEntities = $useDefaultEntities;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('miky_payment');

        if ($this->useDefaultEntities){
            $rootNode
                ->children()
                ->scalarNode('payment_class')->defaultValue(Payment::class)->cannotBeEmpty()->end()
                ->scalarNode('payment_method_class')->defaultValue(PaymentMethod::class)->cannotBeEmpty()->end()
                ->end();
        }else{
            $rootNode
                ->children()
                ->scalarNode('payment_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('payment_method_class')->isRequired()->cannotBeEmpty()->end()
                ->end();
        }

        return $treeBuilder;
    }
}
