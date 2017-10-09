<?php

namespace Miky\Bundle\PaymentBundle\Model;

use Payum\Core\Model\Token;

/**
 * PaymentToken
 */
class PaymentToken extends Token
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

