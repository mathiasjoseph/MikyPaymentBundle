<?php

namespace Miky\Bundle\PaymentBundle\Doctrine\Entity;

/**
 * PaymentToken
 */
class PaymentToken extends \Miky\Bundle\PaymentBundle\Model\PaymentToken
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

