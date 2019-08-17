<?php


namespace Nkootstra\UnitConversion\Unit\Volume;

use Nkootstra\UnitConversion\Unit;

class CentiLiter extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'centiliter',
            'centilitre',
            'cl',
        ])->setUnits(0.01);
    }
}
