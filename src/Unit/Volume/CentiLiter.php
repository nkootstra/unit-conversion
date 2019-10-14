<?php


namespace Nkootstra\UnitConversion\Unit\Volume;

use Nkootstra\UnitConversion\Unit;

class CentiLiter extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            MilliLiter::class   => 10,
            Liter::class        => 0.01,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'centiliter',
            'centilitre',
            'cl',
        ])->setUnits(0.01);
    }
}
