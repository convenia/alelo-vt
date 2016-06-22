<?php

namespace Convenia\AleloOrder\Interfaces;

/**
 * Interface AleloOrderInterface.
 */
interface AleloOrderInterface
{
    /**
     * Generate the alelo orders file.
     *
     * @return string
     */
    public function generate();
}
