<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class MilliMeter extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'millimeter',
            'millimetre',
            'mm',
        ])->setUnits(0.001);
    }
}
