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

namespace CoreShop\Bundle\ResourceBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class Active extends Constraint
{
    public const IS_NOT_ENABLED_ERROR = '20bc0272-8e0b-4693-89a1-feb4ceabcfac';

    public string $message = 'This selected value is not active.';
}
