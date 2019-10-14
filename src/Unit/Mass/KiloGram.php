<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class KiloGram extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            MilliGram::class    => 0.000001,
            Gram::class         => 0.001,
            MetricTon::class    => 1000,
            Ounce::class        => 0.0283495231,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'kilogram',
            'kilo',
            'kg'
        ])->setUnits(1);
    }
}
