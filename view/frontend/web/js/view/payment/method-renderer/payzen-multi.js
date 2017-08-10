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

/*browser:true*/
/*global define*/
define(
    [
        'jquery',
        'Lyranetwork_Payzen/js/view/payment/method-renderer/payzen-abstract'
    ],
    function($, Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Lyranetwork_Payzen/payment/payzen-multi',
                payzenMultiOption: window.checkoutConfig.payment.payzen_multi.availableOptions[0]['key']
            },

            initObservable: function() {
                this._super()
                    .observe('payzenMultiOption');
                return this;
            },

            getData: function() {
                return {
                    'method': this.item.method,
                    'additional_data': {
                        'payzen_multi_option': this.payzenMultiOption()
                    }
                };
            },

            getAvailableOptions: function() {
                return window.checkoutConfig.payment.payzen_multi.availableOptions;
            }
        });
    }
);