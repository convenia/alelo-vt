<?php

namespace Edbizarro\AleloOrder\Registries;

use Edbizarro\Alelo\Fields\Field;
use Edbizarro\AleloOrder\Exceptions\FieldNotExistsException;
use Edbizarro\AleloOrder\Exceptions\RegistryTooLongException;
use Edbizarro\AleloOrder\Exceptions\RegistryTooShortException;
use Edbizarro\AleloOrder\Fields\Validations\Validation;
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
     * @var Validation
     */
    protected $validator;

    /**
     * Registry constructor.
     *
     * @param array $fields
     *
     */
    public function __construct(array $fields = [])
    {
        $this->validator = new Validation();
        $this->validator->make($this->defaultFields);

        $this->fill();

        foreach ($fields as $field => $value) {
            if (array_key_exists($field, $this->defaultFields) === false) {
                throw new FieldNotExistsException($field);
            }

            $this->values[$field]->setValue($value);
        }

        try {
            $this->validator->validate($fields);
        } catch (\Edbizarro\AleloOrder\Exceptions\RegistryTooShortException $e) {
            new RegistryTooShortException($e->getMessage(). 'in registry '.get_class());
        }

        $this->generate();
        $this->validateLength();
    }

    /**
     * Fill the $values array with default and required values
     */
    protected function fill()
    {
        foreach ($this->defaultFields as $field => $values) {
            $defaultValue = isset($this->defaultFields[$field]['defaultValue']) ?
                $this->defaultFields[$field]['defaultValue'] :
                null;

            $this->values[$field] = (new $this->defaultFields[$field]['format']($defaultValue))
                ->setPosition($this->defaultFields[$field]['position'])
                ->setLength($this->defaultFields[$field]['length']);
        }
    }

    /**
     * Generate the full registry string
     *
     * @return string
     */
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
     * Validate if the generated result string matches the length
     * @return bool
     * @throws RegistryTooLongException
     * @throws RegistryTooShortException
     */
    public function validateLength()
    {
        $resultLength = strlen($this->generate());

        if ($resultLength > $this->length) {
            throw new RegistryTooLongException($resultLength);
        }

        if ($resultLength < $this->length) {
            throw new RegistryTooShortException($resultLength);
        }

        return true;
    }

    /**
     * @param $fieldName
     * @return Field
     */
    public function getField($fieldName)
    {
        return $this->values[$fieldName];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->generate();
    }
}
