<?php

namespace Nkootstra\UnitConversion\Tests\Mass;

use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\Unit\Length\Meter;
use Nkootstra\UnitConversion\Unit\Mass\Gram;
use Nkootstra\UnitConversion\Unit\Mass\KiloGram;
use Nkootstra\UnitConversion\Unit\Volume\Liter;
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

    public function testGramToKiloGram()
    {
        $from = new Gram(10000);

        $into = $from->to(KiloGram::class);

        $this->assertInstanceOf(KiloGram::class, $into);
        $this->assertEquals(10, $into->getQuantity());

    }
}
