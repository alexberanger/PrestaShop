<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Form\ChoiceProvider;

use PrestaShop\PrestaShop\Core\DataProvider\OrderStateDataProviderInterface;
use PrestaShop\PrestaShop\Core\Form\FormChoiceProviderInterface;

/**
 * Class OrderStateByIdChoiceProvider provides order state choices with ID values
 */
final class OrderStateByIdChoiceProvider implements FormChoiceProviderInterface
{
    /**
     * @var int language ID
     */
    private $languageId;

    /**
     * @var OrderStateDataProviderInterface
     */
    private $orderStateDataProvider;

    /**
     * @param int $languageId language ID
     * @param OrderStateDataProviderInterface $orderStateDataProvider
     */
    public function __construct($languageId, OrderStateDataProviderInterface $orderStateDataProvider) {
        $this->languageId = $languageId;
        $this->orderStateDataProvider = $orderStateDataProvider;
    }

    /**
     * Get order state choices
     *
     * @return array
     */
    public function getChoices()
    {
        $orderStates = $this->orderStateDataProvider->getOrderStates($this->languageId);
        $choices = [];

        foreach ($orderStates as $orderState) {
            $choices[$orderState['name']] = $orderState['id_order_state'];
        }

        return $choices;
    }
}
