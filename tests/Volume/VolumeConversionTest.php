<?php

namespace Nkootstra\UnitConversion\Tests\Volume;

use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Length\Meter;
use Nkootstra\UnitConversion\Unit\Volume\Liter;
use Nkootstra\UnitConversion\Unit\Volume\MilliLiter;
use Nkootstra\UnitConversion\UnitConversion;
use PHPUnit\Framework\TestCase;

class VolumeConversionTest extends TestCase
{
    public function testLiterToMilliliter()
    {
        $liter = new Liter(0.5);

        $milliliter = $liter->to(MilliLiter::class);

        $this->assertInstanceOf(MilliLiter::class, $milliliter);
        $this->assertEquals(500, $milliliter->getQuantity());

    }

    public function testMilliliterToLiter()
    {
        $milliliter = new MilliLiter(500);

        $liter = $milliliter->to(Liter::class);

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(0.5, $liter->getQuantity());
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

    // @TODO tests for each conversion?
}
