<?php

namespace Edbizarro\AleloOrder\Registries;

use Edbizarro\Alelo\Fields\Field;
use Edbizarro\AleloOrder\Exceptions\FieldNotExistsException;
use Edbizarro\AleloOrder\Exceptions\RegistryTooLong;
use Edbizarro\AleloOrder\Exceptions\RegistryTooLongException;
use Edbizarro\AleloOrder\Interfaces\RegistryInterface;
use Stringy\Stringy;

/**
 * Class Base Registry.
 */
abstract class Registry implements RegistryInterface
{
    /**
     * Total length.
     *
     * @var int
     */
    protected $length = 400;

    /**
     * Final string.
     *
     * @var string
     */
    protected $resultString;

    /**
     * Registry type.
     *
     * @var int
     */
    protected $type;

    /**
     * List of fields and his types.
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
     *
     * @param array $fields
     *
     * @throws \Edbizarro\AleloOrder\Exceptions\FieldNotExistsException
     * @throws \Edbizarro\AleloOrder\Exceptions\RegistryTooLongException
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

        $this->validateLength();
        $this->generate();
    }

    protected function fill()
    {
        foreach ($this->defaultFields as $field => $values) {
            $defaultValue = isset($this->defaultFields[$field]['defaultValue']) ? $this->defaultFields[$field]['defaultValue'] : null;

            $this->values[$field] = (new $this->defaultFields[$field]['format']($defaultValue))
                ->setPosition($this->defaultFields[$field]['position'])
                ->setLength($this->defaultFields[$field]['length']);
        }
    }

    protected function generate()
    {
        $this->resultString = Stringy::create('');

        /**
         * @var Field
         */
        foreach ($this->values as $valueName => $valueClass) {
            $this->resultString = $this->resultString->append($valueClass->getValue());
        }

        return (string) $this->resultString;
    }

    /**
     * @return bool
     * @throws \Edbizarro\AleloOrder\Exceptions\RegistryTooLongException
     */
    public function validateLength()
    {
        if (strlen($this->generate()) !== $this->length) {
            throw new RegistryTooLongException();
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->generate();
    }
}
