<?php


namespace Nkootstra\UnitConversion\Unit\Volume;

use Nkootstra\UnitConversion\Unit;

class MilliLiter extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            Liter::class         => 1000,
            CentiLiter::class    => 10,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'ml',
            'milliliter',
            'millilitre'
        ])->setUnits(0.001);
    }
}
