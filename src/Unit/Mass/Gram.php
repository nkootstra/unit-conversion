<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class Gram extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'gram',
            'gr',
            'g'
        ])->setUnits(0.001);
    }
}
