<?php

namespace Miky\Bundle\PaymentBundle\Doctrine\Entity;

/**
 * Payment
 */
class Payment extends \Miky\Bundle\PaymentBundle\Model\Payment
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

