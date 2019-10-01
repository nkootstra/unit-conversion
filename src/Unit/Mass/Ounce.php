<?php


namespace Nkootstra\UnitConversion\Unit\Mass;

use Nkootstra\UnitConversion\Unit;

class Ounce extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversionRates([
            Gram::class         => 0.03527396,
            MilliGram::class    => 0.00003527,
            KiloGram::class     => 35.27396198,
            MetricTon::class    => 35273.96198069,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'gram',
            'gr',
            'g'
        ])->setUnits(1);
    }
}
