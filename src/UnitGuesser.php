<?php


namespace Nkootstra\UnitConversion;

use HaydenPierce\ClassFinder\ClassFinder;
use InvalidArgumentException;
use mysql_xdevapi\Exception;
use Nkootstra\UnitConversion\Interfaces\UnitInterface;

class UnitGuesser
{
    private const REGEX = '/[0-9]*[\.,]?[0-9]+|(?!x)[a-z]+(?:\([a-z]+\))?$/mi';

    private $knownUnits = [];

    public function __construct()
    {
        $this->initializeUnits();
    }

    /**
     * @param string $input
     * @param UnitInterface|null $default
     * @return Unit|null
     */
    public function from(string $input, ?UnitInterface $default = null): ?Unit
    {
        return $this->guess($input, $default);
    }

    /**
     * @param string $input
     * @param UnitInterface|null $default
     * @return Unit|null
     */
    public function guess(string $input, ?UnitInterface $default = null): ?Unit
    {
        // try to extract quantity and unit
        preg_match_all(self::REGEX, $input, $matches);
        $symbol = array_pop($matches[0]); // e.g. l | Liter | liters
        $volume = $matches[0]; // e.g. 1 | 2.5 | 3,4

        // Where do you want to set the quantity?
        $quantity = $this->getQuantity($volume);

        return $this->getUnit($symbol, $quantity, $default);
    }

    /**
     * @return void
     */
    public function initializeUnits(): void
    {
        // Load known units
        $unitClasses = ClassFinder::getClassesInNamespace(Base::NAMESPACE);
        foreach ($unitClasses as $unitClass) {
            $class = new $unitClass();

            if (method_exists($class, 'getUnits')) {
                $this->knownUnits = array_merge($this->knownUnits, $class->getUnits());
            }
        }

        if (empty($this->knownUnits)) {
            throw new Exception('No known units');
        }
    }

    /**
     * @param array c$numbers
     * @return float|int
     */
    private function getQuantity(array $numbers)
    {
        $quantity = 1;

        foreach ($numbers as $number) {
            // Try to convert volume to a numeric value
            $number = (float)str_replace(',', '.', $number);

            if (false === is_numeric($quantity)) {
                throw new InvalidArgumentException('Invalid values to calculate');
            }

            $quantity = $quantity * $number;
        }

        return $quantity;
    }

    private function getUnit(string $unit, float $quantity, ?UnitInterface $default): ?Unit
    {
        foreach ($this->knownUnits as $knownUnit) {

            $class = new $knownUnit();

            if (method_exists($class, 'is') && method_exists($class, 'setQuantity')) {
                if ($class->is($unit)) {
                    return $class->setQuantity($quantity);
                }
            }
        }

        return $default->setQuantity($quantity);
    }

}