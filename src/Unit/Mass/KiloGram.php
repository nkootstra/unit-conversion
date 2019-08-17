<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class KiloGram extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'kilogram',
            'kilo',
            'kg'
        ])->setUnits(1);
    }
}
