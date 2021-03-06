<?php
/**
 * PayZen V2-Payment Module version 2.4.9 for Magento 2.x. Support contact : support@payzen.eu.
 *
 * @category  Payment
 * @package   Payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2019 Lyra Network and contributors
 * @license   
 */

namespace Lyranetwork\Payzen\Model\Api\Ws;

class ValidatePaymentResponse extends WsResponse
{
    /**
     * @var ValidatePaymentResult $validatePaymentResult
     */
    private $validatePaymentResult = null;

    /**
     * @return ValidatePaymentResult
     */
    public function getValidatePaymentResult()
    {
        return $this->validatePaymentResult;
    }

    /**
     * @param ValidatePaymentResult $validatePaymentResult
     * @return ValidatePaymentResponse
     */
    public function setValidatePaymentResult($validatePaymentResult)
    {
        $this->validatePaymentResult = $validatePaymentResult;
        return $this;
    }
}
