<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class Gram extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            MilliGram::class    => 0.001,
            KiloGram::class     => 1000,
            MetricTon::class    => 1000000,
            Ounce::class        => 28.3495231,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'gram',
            'gr',
            'g'
        ])->setUnits(0.001);
    }
}
