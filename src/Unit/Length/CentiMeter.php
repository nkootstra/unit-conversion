<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class CentiMeter extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'centimeter',
            'centimetre',
            'cm',
        ])->setUnits(0.01);
    }
}
