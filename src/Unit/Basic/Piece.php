<?php


namespace Nkootstra\UnitConversion\Unit\Basic;

use Nkootstra\UnitConversion\Unit;

class Piece extends Unit
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1)
    {
        parent::__construct($quantity);

        // setup symbols and unit
        $this->setSymbols([
            'piece',
            'stuk',
            'st'
        ])->setUnits(1);
    }
}
