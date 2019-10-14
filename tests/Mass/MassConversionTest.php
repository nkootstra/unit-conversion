<?php

namespace Nkootstra\UnitConversion\Tests\Mass;

use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\Unit\Length\Meter;
use Nkootstra\UnitConversion\Unit\Mass\Gram;
use Nkootstra\UnitConversion\Unit\Mass\KiloGram;
use Nkootstra\UnitConversion\Unit\Volume\Liter;
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

    public function testGramToKiloGram()
    {
        $from = new Gram(10000);

        $into = $from->to(KiloGram::class);

        $this->assertInstanceOf(KiloGram::class, $into);
        $this->assertEquals(10, $into->getQuantity());

    }

    public function testKiloGramToOtherUnit()
    {
        $this->expectException(CouldNotConvertException::class);

        $kilogram = new KiloGram(0.5);

        $liter = $kilogram->to(Liter::class);

    }

    public function testKiloGramToOtherNotExistingUnit()
    {
        $this->expectException(\Error::class);

        $kilogram = new KiloGram(0.5);

        $unknown = $kilogram->to('Not\Exists');

    }

    public function testKiloGramToBaseUnit()
    {
        // Error: Cannot instantiate abstract class Nkootstra\UnitConversion\Unit
        $this->expectException(\Error::class);

        $kilogram = new KiloGram(0.5);

        $base = $kilogram->to(Unit::class);

    }

    // @TODO tests for each conversion?
}
