<?php
/**
 * PayZen V2-Payment Module version 2.1.1 for Magento 2.x. Support contact : support@payzen.eu.
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the Open Software License version 3.0
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category  payment
 * @package   payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2016 Lyra Network and contributors
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Lyranetwork\Payzen\Controller\Processor;

class RedirectProcessor
{
    /**
     * @var \Lyranetwork\Payzen\Helper\Data
     */
    private $dataHelper;

    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @param \Lyranetwork\Payzen\Helper\Data $dataHelper
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Lyranetwork\Payzen\Helper\Data $dataHelper,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->dataHelper = $dataHelper;
        $this->coreRegistry = $coreRegistry;
    }

    public function execute(\Lyranetwork\Payzen\Api\RedirectActionInterface $controller)
    {
        try {
            $order = $controller->getAndCheckOrder();

            // add history comment and save it
            $order->addStatusHistoryComment(__('Client sent to PayZen platform.'), false)
                    ->setIsCustomerNotified(false)
                    ->save();

            $method = $order->getPayment()->getMethodInstance();
            $this->coreRegistry->register(
                \Lyranetwork\Payzen\Block\Constants::PARAMS_REGISTRY_KEY,
                $method->getFormFields($order)
            );
            $this->coreRegistry->register(\Lyranetwork\Payzen\Block\Constants::URL_REGISTRY_KEY, $method->getPlatformUrl());

            // redirect to platform
            $this->dataHelper->log(
                "Client {$order->getCustomerEmail()} sent to payment page for order #{$order->getId()}."
            );

            return $controller->forward();
        } catch (\Lyranetwork\Payzen\Model\OrderException $e) {
            return $controller->back($e->getMessage());
        }
    }
}
