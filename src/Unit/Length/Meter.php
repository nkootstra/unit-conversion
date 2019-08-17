<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class Meter extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'meter',
            'metre',
            'm'
        ])->setUnits(1);
    }
}
