<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\Exception\CouldNotConvertException;
use Nkootstra\UnitConversion\UnitConversion;
use Nkootstra\UnitConversion\Unit\Length;
use PHPUnit\Framework\TestCase;

class UnitConversionTest extends TestCase
{
    private $conversion;

    public function setUp()
    {
        $this->conversion = new UnitConversion;
        $this->unit = new Length\CentiMeter();
        $this->unit->setQuantity('150');
    }

    public function testUnitIsInvalid()
    {
        $this->expectException(\Error::class);

        $convertedUnit = $this->conversion->convert($this->unit, 'Liter');
    }

    public function testUnitIsValid()
    {
        $convertedUnit = $this->conversion->convert($this->unit, Length\Meter::class);
        $this->assertEquals('1.5', $convertedUnit->getQuantity());
    }
}
