<?php

namespace Nkootstra\UnitConversion\Tests\Mass;

use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\Unit;
use Nkootstra\UnitConversion\Unit\Length\Meter;
use Nkootstra\UnitConversion\Unit\Length\MilliMeter;
use Nkootstra\UnitConversion\Unit\Length\CentiMeter;
use Nkootstra\UnitConversion\Unit\Length\Inch;
use Nkootstra\UnitConversion\Unit\Mass\Gram;
use Nkootstra\UnitConversion\Unit\Volume\MilliLiter;
use PHPUnit\Framework\TestCase;

class LengthConversionTest extends TestCase
{
    public function testInchToCentimeter()
    {
        $from = new Inch(2);

        $into = $from->to(CentiMeter::class);

        $this->assertInstanceOf(CentiMeter::class, $into);
        $this->assertEquals(5.08, number_format($into->getQuantity(), 2));
    }

    public function testCentimetersToMillimeters()
    {
        $from = new CentiMeter(145);

        $into = $from->to(MilliMeter::class);

        $this->assertInstanceOf(MilliMeter::class, $into);
        $this->assertEquals(1450, $into->getQuantity());
    }

    // @TODO tests for each conversion?
}
