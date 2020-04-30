<?php
/**
 * PayZen V2-Payment Module version 1.11.1 for Magento 1.4-1.9. Support contact : support@payzen.eu.
 *
 * @category  Payment
 * @package   Payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2019 Lyra Network and contributors
 * @license   
 */

namespace Lyranetwork\Payzen\Model\Api\Ws;

class CancelTokenResponse extends WsResponse
{
    /**
     * @var CancelTokenResult $cancelTokenResult
     */
    private $cancelTokenResult = null;

    /**
     * @return CancelTokenResult
     */
    public function getCancelTokenResult()
    {
        return $this->cancelTokenResult;
    }

    /**
     * @param CancelTokenResult $cancelTokenResult
     * @return CancelTokenResponse
     */
    public function setCancelTokenResult($cancelTokenResult)
    {
        $this->cancelTokenResult = $cancelTokenResult;
        return $this;
    }
}
