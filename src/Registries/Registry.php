<?php

namespace Edbizarro\AleloOrder\Registries;

use Edbizarro\AleloOrder\Exceptions\FieldNotExistsException;
use Edbizarro\AleloOrder\Interfaces\RegistryInterface;

/**
 * Class Base Registry.
 */
abstract class Registry implements RegistryInterface
{
    /**
     * Total length
     *
     * @var int
     */
    protected $length = 400;

    /**
     * Registry type
     *
     * @var int
     */
    protected $type;

    /**
     * List of fields and his types
     *
     * @var array
     */
    protected $defaultFields = [];

    /**
     * @var array
     */
    protected $values = [];

    /**
     * Registry constructor.
     * @param array $fields
     * @throws \Edbizarro\AleloOrder\Exceptions\FieldNotExistsException
     */
    public function __construct(array $fields = [])
    {
        $this->fill();

        foreach ($fields as $field => $value) {
            if (array_key_exists($field, $this->defaultFields) === false) {
                throw new FieldNotExistsException($field);
            }

            $this->values[$field]->setValue($value);
        }

        $this->generate();
    }

    /**
     *
     */
    protected function fill()
    {
        foreach ($this->defaultFields as $field => $values) {
            $this->values[$field] = (new $this->defaultFields[$field]['format']);
        }
    }

    /**
     * 
     */
    public function generate()
    {
    }

    /**
     * @return bool
     */
    public function validateLength()
    {
        return (strlen($this->generate()) !== $this->length);
    }
}
