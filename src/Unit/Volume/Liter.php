<?php


namespace Nkootstra\UnitConversion\Unit\Volume;

use Nkootstra\UnitConversion\Unit;

class Liter extends Unit
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
            'l',
            'liter',
            'litre'
        ])->setUnits(1);
    }
}
