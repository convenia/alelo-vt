<?php

namespace Edbizarro\AleloOrder\Interfaces;

/**
 * Interface AleloOrderInterface.
 */
interface AleloOrderInterface
{
    /**
     * Generate the alelo orders file
     *
     * @return string
     */
    public function generate();
}
