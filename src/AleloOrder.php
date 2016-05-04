<?php

namespace Edbizarro\AleloOrder;

use Edbizarro\AleloOrder\Interfaces\AleloOrderInterface;

/**
 * Class AleloOrder.
 */
class AleloOrder implements AleloOrderInterface
{
    public function generate()
    {
        return 'Generated from package';
    }
}
