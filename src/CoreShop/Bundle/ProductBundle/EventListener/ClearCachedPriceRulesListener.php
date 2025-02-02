<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace CoreShop\Bundle\ProductBundle\EventListener;

use CoreShop\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use CoreShop\Component\Product\Model\ProductPriceRuleInterface;
use CoreShop\Component\Product\Model\ProductSpecificPriceRuleInterface;
use CoreShop\Component\Rule\Model\RuleInterface;
use Pimcore\Cache;

final class ClearCachedPriceRulesListener
{
    public function clearCachedRules(ResourceControllerEvent $event): void
    {
        /**
         * @var RuleInterface $rule
         */
        $rule = $event->getSubject();

        if ($rule instanceof ProductPriceRuleInterface || $rule instanceof ProductSpecificPriceRuleInterface) {
            Cache::clearTag('product_price_rule');
        }
    }
}
