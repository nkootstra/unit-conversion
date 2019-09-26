<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\UnitConversion;
use Nkootstra\UnitConversion\Unit\Length\CentiMeter;
use PHPUnit\Framework\TestCase;

class UnitConversionTest extends TestCase
{
    private $conversion;

    public function setUp()
    {
        $this->conversion = new UnitConversion;
        $this->unit = new CentiMeter();
        $this->unit->setQuantity('1500');
    }

    public function testUnitIsInvalid()
    {
        $convertedUnit = $this->conversion->convert($this->unit, 'liter');
        $this->assertNull($convertedUnit);
    }

    public function testUnitIsValid()
    {
        $convertedUnit = $this->conversion->convert($this->unit, 'meter');
        $this->assertEquals('1.5', $convertedUnit->getQuantity());
    }
}
