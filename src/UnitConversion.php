<?php

namespace Nkootstra\UnitConversion;

use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\UnitGuesser;

class UnitConversion
{
    private function convert(Unit $unit, string $convertToUnit)
    {
        // Check if it's a valid unit.
        $guesser = new UnitGuesser;
        if (($knownUnit = $guesser->isKnownUnit($convertToUnit)) !== null) {
            return $this->convertTo($knownUnit);
        }

        // Invalid Unit, we can't convert it. @todo throw Exception?
        return null;
    }
}
