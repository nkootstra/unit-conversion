<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class CentiMeter extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            MilliMeter::class   => 0.1,
            Inch::class         => 2.54,
            Meter::class        => 100,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'centimeter',
            'centimetre',
            'cm',
        ])->setUnits(0.01);
    }
}
