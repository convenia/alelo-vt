<?php

namespace Convenia\AleloVt\Interfaces;

/**
 * Interface AleloVtInterface.
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
