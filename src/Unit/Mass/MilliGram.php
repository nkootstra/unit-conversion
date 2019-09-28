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

        $this->setConversionRates([
            MetricTon::class    => 1000000000,
            Gram::class         => 1000,
            KiloGram::class     => 1000000,
            Ounce::class        => 28349.5231,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'milligram',
            'mg'
        ])->setUnits(0.000001);
    }
}
