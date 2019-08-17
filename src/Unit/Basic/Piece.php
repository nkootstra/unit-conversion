<?php


namespace Nkootstra\UnitConversion\Unit\Basic;

use Nkootstra\UnitConversion\Unit;

class Piece extends Unit
{
    /**
     * Setup unit
     */
    public function __construct()
    {
        parent::__construct();

        // setup symbols and unit
        $this->setSymbols([
            'piece',
            'stuk',
            'st'
        ])->setUnits(1);
    }
}
