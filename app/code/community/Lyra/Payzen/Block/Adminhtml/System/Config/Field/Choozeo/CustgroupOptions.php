<?php
/**
 * PayZen V2-Payment Module version 1.9.2 for Magento 1.4-1.9. Support contact : support@payzen.eu.
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the Open Software License version 3.0
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 *
 * @category  Payment
 * @package   Payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2018 Lyra Network and contributors
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Custom renderer for the PayZen customer group options field.
 */
class Lyra_Payzen_Block_Adminhtml_System_Config_Field_Choozeo_CustgroupOptions
    extends Lyra_Payzen_Block_Adminhtml_System_Config_Field_CustgroupOptions
{
    public function __construct()
    {
        parent::__construct();

        $this->_default = array('amount_min' => '135', 'amount_max' => '2000');
    }
}
