<?php

namespace Miky\Bundle\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MikyPaymentBundle:Default:index.html.twig');
    }
}
