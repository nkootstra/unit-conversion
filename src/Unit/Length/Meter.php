<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class Meter extends Unit
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
            'meter',
            'metre',
            'm'
        ])->setUnits(1);
    }
}
