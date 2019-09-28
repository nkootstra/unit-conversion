<?php


namespace Nkootstra\UnitConversion;


use Error;
use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\Interfaces\UnitInterface;
use ReflectionClass;

abstract class Unit implements UnitInterface
{
    /**
     * Name of Unit
     *
     * @var string
     */
    protected $name;

    /**
     * Base of Unit
     *
     * @var UnitInterface
     */
    protected $base;

    /**
     * Contains array of conversions that are possible for the Unit
     *
     * @var array
     */
    protected $conversions;

    /**
     * Contains array of symbols that represent Unit
     *
     * @var array
     */
    protected $symbols;

    /**
     * Amount needed to represent 1 Unit
     *
     * @var float
     */
    protected $units;

    /**
     * Quantity of Unit
     *
     * @var float
     */
    protected $quantity;

    public function __construct($quantity = 1)
    {
        // set name
        $this->setName(
            (new ReflectionClass($this))
                ->getShortName()
        );

        $this->quantity = $quantity;
    }

    public function is(string $unit)
    {
        if (in_array($unit, $this->getSymbols())) {
            return true;
        }

        // slow :(
        foreach ($this->getSymbols() as $symbol) {
            if (strpos($unit, $symbol) === 0 && strlen($symbol) > 2) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UnitInterface
     */
    public function setName(string $name): UnitInterface
    {
        $this->name = strtolower($name);

        return $this;
    }

    /**
     * @return string
     */
    public function getBase(): UnitInterface
    {
        return $this->base;
    }

    /**
     * @param UnitInterface $base
     * @return UnitInterface
     */
    public function setBase(UnitInterface $base): UnitInterface
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return array
     */
    public function getConversions(): array
    {
        return $this->conversions;
    }

    /**
     * @param array $conversions
     * @return UnitInterface
     */
    public function setConversions(array $conversions): UnitInterface
    {
        $this->conversions = $conversions;

        return $this;
    }

    /**
     * @return array
     */
    public function getSymbols(): array
    {
        return $this->symbols;
    }

    /**
     * @param array $symbols
     * @return UnitInterface
     */
    public function setSymbols(array $symbols): UnitInterface
    {
        $this->symbols = $symbols;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnits(): float
    {
        return $this->units;
    }

    /**
     * @param float $units
     * @return UnitInterface
     */
    public function setUnits(float $units): UnitInterface
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return UnitInterface
     */
    public function setQuantity(float $quantity): UnitInterface
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param string $unit
     * @return UnitInterface|null
     * @throws CouldNotConvertException
     * @throws \ReflectionException
     * @throws Error
     */
    public function to(string $unit): ?UnitInterface
    {
        // create instance
        /** @var Unit $intoUnit */
        $intoUnit = new $unit(); // this will result in a Error Exception if the class could not be found

        if(!is_subclass_of($intoUnit, Unit::class)) {
            throw new CouldNotConvertException('$unit is not a sub class of UnitInterface');
        }

        $currentClass = new \ReflectionClass($this);
        $intoClass = new \ReflectionClass($intoUnit);

        if($currentClass->getNamespaceName() !== $intoClass->getNamespaceName()) {
            throw new CouldNotConvertException('Could not convert ' . $this->getName() . ' into ' . $intoUnit->getName());
        }

        if($this->getUnits() > $intoUnit->getUnits()) {
            $intoUnit->setQuantity($this->getQuantity() / $intoUnit->getUnits());
        } else {
            $intoUnit->setQuantity($this->getQuantity() / ($intoUnit->getUnits()/$this->getUnits()));
        }

        return $intoUnit;
    }
}
