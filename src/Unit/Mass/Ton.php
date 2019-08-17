<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class Ton extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'ton',
            't'
        ])->setUnits(1000);
    }
}
