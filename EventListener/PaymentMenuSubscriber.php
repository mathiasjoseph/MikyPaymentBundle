<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 26/11/16
 * Time: 04:06
 */

namespace Miky\Bundle\PaymentBundle\EventListener;

use Miky\Bundle\AdminBundle\Menu\AdminMenuBuilder;
use Miky\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PaymentMenuSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            AdminMenuBuilder::EVENT_NAME => 'onAdminMenu',
        );
    }

    public function onAdminMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $paymentSubMenu = $menu
            ->addChild('payment')
            ->setLabel('miky_payment.payments')
            ->setLabelAttribute('icon', 'credit-card-alt')
        ;
        $paymentList = $paymentSubMenu
            ->addChild('payment_list', ['route' => 'miky_payment_admin_payment_index'])
            ->setLabel('miky_payment.payments')
            ->setLabelAttribute('icon', 'credit-card-alt')
        ;
        $paymentList = $paymentSubMenu
            ->addChild('payment_methods', ['route' => 'miky_payment_admin_payment_method_index'])
            ->setLabel('miky_payment.payment_methods')
            ->setLabelAttribute('icon', 'credit-card-alt')
        ;

    }
}