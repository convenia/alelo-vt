<?php

namespace Edbizarro\AleloOrder;

use Edbizarro\AleloOrder\Interfaces\AleloOrderInterface;
use Edbizarro\AleloOrder\Registries\BranchRegistry;
use Edbizarro\AleloOrder\Registries\EmployeeRegistry;
use Edbizarro\AleloOrder\Registries\HeaderRegistry;
use Edbizarro\AleloOrder\Registries\TraillerRegistry;
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
     * @var BranchRegistry
     */
    protected $branch;

    /**
     * Array of EmployeeRegisty
     *
     * @var array
     */
    protected $employees = [];

    /**
     * @var TraillerRegistry
     */
    protected $traillerRegistry;

    /**
     * @var bool
     */
    protected $autoBranchFill = true;

    /**
     * AleloOrder constructor.
     * @param array $headerData
     */
    public function __construct(array $headerData)
    {
        if (isset($headerData['registryId'])) {
            unset($headerData['registryId']);
        }

        $headerData['registryId'] = 1;

        $this->header = new HeaderRegistry($headerData);
        $this->fileLayout = Stringy::create('');

        if ($this->autoBranchFill) {
            $this->generateBranchRegistryFromHeader($headerData);
        }
    }

    /**
     * @param array $headerData
     */
    protected function generateBranchRegistryFromHeader(array $headerData)
    {
        $branchData = [
            'aleloCompanyCod' => 00,
            'branchCod' => '',
            'cnpjBase' => substr($headerData['cnpj'], 0, 8),
            'cnpjBranch' => substr($headerData['cnpj'], 8, 4),
            'cnpjDigit' => substr($headerData['cnpj'], 12, 2),
            'firstContactName' => 'Marcelo',
            'name' => $headerData['name'],
            'registryId' => 2
        ];

        $branchData = new BranchRegistry($branchData);

        $this->branch = $branchData;
    }

    /**
     * @param array $employeeData
     */
    public function addEmployee(array $employeeData)
    {
        $registryId = 2+count($this->getAllEmployees())+1;
        $employeeData = array_merge(['registryId' => $registryId], $employeeData);

        $this->employees[] = new EmployeeRegistry($employeeData);
    }

    /**
     * @return array
     */
    public function getAllEmployees()
    {
        return $this->employees;
    }

    /**
     * @return int
     */
    public function employeesCount()
    {
        return count($this->getAllEmployees());
    }

    /**
     * Generate the alelo orders file.
     *
     * @return string
     */
    public function generate()
    {
        $this->generateTraillerRegistry();
        $this->fileLayout = $this->fileLayout->append((string) $this->header);
        $this->fileLayout = $this->fileLayout->append(PHP_EOL);
        $this->fileLayout = $this->fileLayout->append((string) $this->branch);
        $this->fileLayout = $this->fileLayout->append(PHP_EOL);

        foreach ($this->getAllEmployees() as $employeeRegistry) {
            $this->fileLayout = $this->fileLayout->append((string) $employeeRegistry);
            $this->fileLayout = $this->fileLayout->append(PHP_EOL);
        }

        $this->fileLayout = $this->fileLayout->append((string) $this->traillerRegistry);

        return (string) $this->fileLayout;
    }

    /**
     * Generate the Trailler Registry.
     */
    protected function generateTraillerRegistry()
    {
        $this->traillerRegistry = new TraillerRegistry(
            [
                'employeeRegTotals' => $this->employeesCount(),
                'orderTotal' => $this->orderTotal(),
                'registryId' => count($this->getAllEmployees())+3,
            ]
        );
        return $this->traillerRegistry;
    }

    /**
     * @return int
     */
    protected function orderTotal()
    {
        $orderTotal = 0;

        /** @var EmployeeRegistry $employee */
        foreach ($this->getAllEmployees() as $employee) {
            $orderTotal += $employee->getField('monthValue')->getValue();
        }

        return $orderTotal;
    }
}
