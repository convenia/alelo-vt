<?php

namespace Edbizarro\AleloOrder;

use Edbizarro\AleloOrder\Interfaces\AleloOrderInterface;

class AleloOrder implements AleloOrderInterface
{
    public function generate()
    {
        return 'Generated from package';
    }
}
