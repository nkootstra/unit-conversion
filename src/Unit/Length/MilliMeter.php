<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class MilliMeter extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            CentiMeter::class   => 100,
            Inch::class         => 25.4,
            Meter::class        => 1000,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'millimeter',
            'millimetre',
            'mm',
        ])->setUnits(0.001);
    }
}
