<?php

namespace Convenia\AleloVt\Tests\Fields\Validations;

use Convenia\AleloVt\Fields\Validations\Validation;
use Convenia\AleloVt\Tests\BaseTest;

/**
 * Class ValidationTest.
 */
class ValidationTest extends BaseTest
{
    /**
     * @expectedException \Convenia\AleloVt\Exceptions\ValidatorInvalidRuleException
     */
    public function test_invalid_rule()
    {
        $validator = new Validation();
        $rules = [
            'field1' => [
                'rules' => [
                    'invalid_rule',
                ],
            ],
        ];

        $validator->make($rules);
        $validator->validate(['field1' => '05052016', 'test' => 'value2']);
    }

    /**
     * @expectedException \Convenia\AleloVt\Exceptions\ValidatorException
     */
    public function test_rule_fails()
    {
        $validator = new Validation();
        $rules = [
            'field1' => [
                'rules' => [
                    'required',
                ],
            ],
        ];

        $validator->make($rules);
        $validator->validate(['field2' => '05052016', 'test' => 'value2']);
    }

    public function test_validate_required()
    {
        $validator = new Validation();

        $rules = [
            'field1' => [
                'format' => FieldN::class,
                'position' => 2,
                'length' => 8,
                'rules' => [
                    'required',
                ],
            ],
        ];

        $validator->make($rules);
        $validator->validate(['field1' => '05052016', 'test' => 'value2']);

        $this->assertTrue($validator->isValid());
    }

    public function test_validate_date()
    {
        $validator = new Validation();

        $rules = [
            'field1' => [
                'format' => FieldN::class,
                'required' => true,
                'position' => 2,
                'length' => 8,
                'rules' => [
                    'required',
                    'date:dmY',
                ],
            ],
        ];

        $validator->make($rules);
        $validator->validate(['field1' => '05052016', 'test' => 'value2']);

        $this->assertTrue($validator->isValid());
    }

    public function test_validate_with_no_rule()
    {
        $validator = new Validation();

        $rules = [
            'no_rule' => [],
        ];

        $validator->make($rules);
        $validator->validate(['no_rule' => '05052016']);

        $this->assertTrue($validator->isValid());
    }
}
