<?php

namespace Nkootstra\UnitConversion;

use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\UnitGuesser;

class UnitConversion
{
    public function convert(Unit $unit, string $convertToUnit)
    {
        // Check if it's a valid unit.
        $guesser = new UnitGuesser;
        if (($knownUnit = $guesser->isKnownUnit($convertToUnit)) !== null) {
            return $unit->convertTo($knownUnit);
        }

        // Invalid Unit, we can't convert it. @todo throw Exception?
        return null;
    }
}
