<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class Meter extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            MilliMeter::class   => 0.001,
            CentiMeter::class   => 0.01,
            Inch::class         => 0.0254,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'meter',
            'metre',
            'm'
        ])->setUnits(1);
    }
}
