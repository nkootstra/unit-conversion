<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class MetricTon extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            MilliGram::class    => 0.000000001,
            Gram::class         => 0.000001,
            KiloGram::class     => 0.001,
            Ounce::class        => 0.0000283495231,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'ton',
            't'
        ])->setUnits(1000);
    }
}
