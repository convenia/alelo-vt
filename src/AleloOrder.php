<?php

namespace Edbizarro\AleloOrder;

use Edbizarro\AleloOrder\Interfaces\AleloOrderInterface;
use Edbizarro\AleloOrder\Registries\HeaderRegistry;
use Stringy\Stringy;

/**
 * Class AleloOrder.
 */
class AleloOrder implements AleloOrderInterface
{
    /**
     * @var Stringy
     */
    protected $fileLayout;

    /**
     * @var HeaderRegistry
     */
    protected $header;

    /**
     * Array of EmployeeRegisty
     *
     * @var array
     */
    protected $employees = [];

    /**
     * AleloOrder constructor.
     */
    public function __construct()
    {
        $this->fileLayout = Stringy::create('');
    }

    /**
     * Generate the alelo orders file.
     *
     * @return string
     */
    public function generate()
    {
        $this->fileLayout = $this->fileLayout->append();

        return (string) $this->fileLayout;
    }
}
