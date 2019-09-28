<?php

namespace Nkootstra\UnitConversion;

use Nkootstra\UnitConversion\Unit;

class UnitConversion
{
    public function convert(Unit $unit, string $convertToUnit)
    {
        return $unit->to($convertToUnit);
    }
}
