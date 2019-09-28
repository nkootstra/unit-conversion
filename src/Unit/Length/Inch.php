<?php


namespace Nkootstra\UnitConversion\Unit\Length;

use Nkootstra\UnitConversion\Unit;

class Inch extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        $this->setConversions([
            MilliMeter::class   => 0.03937008,
            CentiMeter::class   => 0.39370079,
            Meter::class        => 39.37007874,
        ]);

        // setup symbols and unit
        $this->setSymbols([
            'in',
            'inch',
            'inches'
        ])->setUnits(1);
    }
}
