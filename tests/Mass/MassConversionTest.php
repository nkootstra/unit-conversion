<?php

namespace Nkootstra\UnitConversion\Tests\Mass;

use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\Unit\Mass\Gram;
use Nkootstra\UnitConversion\Unit\Mass\KiloGram;
use Nkootstra\UnitConversion\Unit\Volume\MilliLiter;
use PHPUnit\Framework\TestCase;

class MassConversionTest extends TestCase
{
    public function testKiloGramToGram()
    {
        $from = new KiloGram(0.5);

        $into = $from->to(Gram::class);

        $this->assertInstanceOf(Gram::class, $into);
        $this->assertEquals(500, $into->getQuantity());

    }

    public function testMilliliterToLiter()
    {
        $from = new MilliLiter(500);

        $into = $from->to(Liter::class);

        $this->assertInstanceOf(Liter::class, $into);
        $this->assertEquals(0.5, $into->getQuantity());
    }

    public function testLiterToOtherUnit()
    {
        $this->expectException(CouldNotConvertException::class);

        $liter = new Liter(0.5);

        $meter = $liter->to(Meter::class);

    }

    public function testLiterToOtherNotExistingUnit()
    {
        $this->expectException(\Error::class);

        $liter = new Liter(0.5);

        $meter = $liter->to('Not\Exists');

    }

    public function testLiterToBaseUnit()
    {
        // Error: Cannot instantiate abstract class Nkootstra\UnitConversion\Unit
        $this->expectException(\Error::class);

        $liter = new Liter(0.5);

        $meter = $liter->to(Unit::class);

    }
}
