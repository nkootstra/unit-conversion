<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class KiloGram extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        // setup symbols and unit
        $this->setSymbols([
            'kilogram',
            'kilo',
            'kg'
        ])->setUnits(1);
    }
}
