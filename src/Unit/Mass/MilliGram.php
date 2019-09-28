<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class MilliGram extends Unit
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
            'milligram',
            'mg'
        ])->setUnits(0.000001);
    }
}
