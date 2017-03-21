<?php

namespace Convenia\AleloVt\Tests\Registries;

use Convenia\AleloVt\Registries\BenefitRegistry;
use Convenia\AleloVt\Tests\BaseTest;

/**
 * Class BranchRegistryTest.
 */
class BranchRegistryTest extends BaseTest
{
    public function test_complete_fields()
    {
        $header = new BenefitRegistry(
            [
                'registryType' => '',
                'cnpjBase' => '',
                'cnpjBranch' => '',
                'cnpjDigit' => '',
                'aleloCompanyCod' => '',
                'name' => '',
                'areaCode' => '',
                'firstContactName' => '',
                'firstContactAddress' => '',
                'firstContactPhone' => '',
                'firstContactBranch' => '',
                'secondContactName' => '',
                'secondContactAddress' => '',
                'secondContactPhone' => '',
                'secondContactBranch' => '',
                'thirdContactName' => '',
                'thirdContactAddress' => '',
                'thirdContactPhone' => '',
                'thirdContactBranch' => '',
                'branchCod' => '',
                'blankSpaces' => '',
                'registryId' => '',
            ]
        );

        $expected = '0000000000000000000000000                                   0000                                                                           000000000000000000                                                                           000000000000000000                                                                           000000000000000000                                                   000000';

        $this->assertEquals($expected, (string) $header);
    }
}
