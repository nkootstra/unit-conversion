<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\Unit\Volume\Liter;
use PHPUnit\Framework\TestCase;

class VolumeLiterTest extends TestCase
{
    public function testBaseNameOfLiter()
    {
        $unit = new Liter;

        $this->assertEquals('liter', $unit->getName());
    }

    public function testUnitsInLiter()
    {
        $unit = new Liter;

        $this->assertEquals(1, $unit->getUnits());
    }

    public function testSymbolsInLiter()
    {
        $unit = new Liter;

        $this->assertEquals([
            'l',
            'liter',
            'litre'
        ], $unit->getSymbols());
    }
}
