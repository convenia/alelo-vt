<?php

namespace Convenia\AleloVt;

use Convenia\AleloVt\Interfaces\AleloVtInterface;
use Convenia\AleloVt\Registries\AdditionalRegistry;
use Convenia\AleloVt\Registries\AddressesRegistry;
use Convenia\AleloVt\Registries\BenefitRegistry;
use Convenia\AleloVt\Registries\ResidenceRegistry;
use Convenia\AleloVt\Registries\UserRegistry;
use Convenia\AleloVt\Registries\HeaderRegistry;
use Convenia\AleloVt\Registries\TraillerRegistry;
use Stringy\Stringy;

/**
 * Class AleloVt.
 */
class AleloVt implements AleloVtInterface
{
    /**
     * @var Stringy
     */
    protected $fileLayout;

    /**
     * @var array
     */
    protected $registries;

    protected $addresses = [];
    protected $users = [];
    protected $benefits = [];
    protected $residences = [];
    protected $adicionals = [];

    /**
     * @var TraillerRegistry
     */
    protected $traillerRegistry;

    /**
     * @var bool
     */
    protected $autoBranchFill = true;

    /**
     * AleloVt constructor.
     *
     * @param array $headerData
     */
    public function __construct(array $headerData)
    {
        if (isset($headerData['registryId'])) {
            unset($headerData['registryId']);
        }

        $headerData['registryId'] = 1;

        $this->registries[] = new HeaderRegistry($headerData);
        $this->fileLayout = Stringy::create('');
    }

    /**
     * @param array $addressData
     *
     * @return bool
     */
    public function addAddress(array $addressData)
    {
        $registryId = count($this->registries) + 1;
        $fullData = array_merge(['registryId' => $registryId], $addressData);

        new AddressesRegistry($fullData);
        $this->addresses[] = $addressData;

        return true;
    }

    public function addUser(array $userData)
    {
        $registryId = count($this->registries) + 1;
        $fullData = array_merge(['registryId' => $registryId], $userData);

        new UserRegistry($fullData);
        $this->users[] = $userData;

        return true;
    }

    public function addBenefit(array $benefitData)
    {
        $registryId = count($this->registries) + 1;
        $fullData = array_merge(['registryId' => $registryId], $benefitData);

        new BenefitRegistry($fullData);
        $this->benefits[] = $benefitData;

        return true;
    }

    public function addResidence(array $residenceData)
    {
        $registryId = count($this->registries) + 1;
        $fullData = array_merge(['registryId' => $registryId], $residenceData);

        new ResidenceRegistry($fullData);
        $this->residences[] = $residenceData;

        return true;
    }

    public function addAdditional(array $additionalData)
    {

        $registryId = count($this->registries) + 1;
        $fullData = array_merge(['registryId' => $registryId], $additionalData);

        new AdditionalRegistry($fullData);
        $this->adicionals[] = $additionalData;

        return true;
    }

    public function addRegistry($registry, $class)
    {
        $countPlusOne = count($this->registries) + 1;
        $fullData = array_merge(['registryId' => $countPlusOne], $registry);
        $object = new $class($fullData);
        $this->registries[] = $object;
    }

    public function addRegistries($registries, $class)
    {
        foreach ($registries as $registry) {
            $this->addRegistry($registry, $class);
        }
    }

    /**
     * Generate the alelo orders file.
     *
     * @return string
     */
    public function generate()
    {
        $this->addRegistries($this->addresses, AddressesRegistry::class);
        $this->addRegistries($this->users, UserRegistry::class);
        $this->addRegistries($this->benefits, BenefitRegistry::class);
        $this->addRegistries($this->residences, ResidenceRegistry::class);
        $this->addRegistries($this->adicionals, AdditionalRegistry::class);

        $this->generateTraillerRegistry();

        foreach ($this->registries as $line) {
            $this->fileLayout = $this->fileLayout->append($line->__toString());
            $this->fileLayout = $this->fileLayout->append("\n");
        }

        return (string) $this->fileLayout;
    }

    /**
     * Generate the Trailler Registry.
     */
    protected function generateTraillerRegistry()
    {
        $this->registries[] = new TraillerRegistry(
            [
                'type1' => count($this->addresses),
                'type2' => count($this->users),
                'type3' => count($this->benefits),
                'type4' => count($this->residences),
                'type5' => count($this->adicionals),
                'registryId' => count($this->registries) + 1,
            ]
        );
    }
}
