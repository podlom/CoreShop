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

namespace CoreShop\Component\Order\Factory;

use CoreShop\Component\Order\Model\OrderInterface;
use CoreShop\Component\Order\Model\OrderItemInterface;
use CoreShop\Component\Order\Model\PurchasableInterface;
use CoreShop\Component\Resource\Factory\FactoryInterface;

class OrderItemFactory implements OrderItemFactoryInterface
{
    public function __construct(private FactoryInterface $cartItemFactory)
    {
    }

    public function createNew()
    {
        return $this->cartItemFactory->createNew();
    }

    public function createWithCart(OrderInterface $cart, PurchasableInterface $purchasable): OrderItemInterface
    {
        $item = $this->cartItemFactory->createNew();
        $item->setKey(uniqid());
        $item->setParent($cart);
        $item->setQuantity(0);
        $item->setProduct($purchasable);
        $item->setPublished(true);

        $cart->addItem($item);

        return $item;
    }

    public function createWithPurchasable(PurchasableInterface $purchasable): OrderItemInterface
    {
        $item = $this->cartItemFactory->createNew();
        $item->setKey(uniqid());
        $item->setQuantity(0);
        $item->setProduct($purchasable);
        $item->setPublished(true);

        return $item;
    }
}
