<?php

namespace Miky\Bundle\PaymentBundle\Doctrine\Entity;

/**
 * GatewayConfig
 */
class GatewayConfig extends \Miky\Bundle\PaymentBundle\Model\GatewayConfig
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

