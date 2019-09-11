<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\Unit\Volume;
use Nkootstra\UnitConversion\Unit\Volume\CentiLiter;
use Nkootstra\UnitConversion\Unit\Volume\Liter;
use Nkootstra\UnitConversion\Unit\Volume\MilliLiter;
use PHPUnit\Framework\TestCase;

class VolumeTest extends TestCase
{
    protected $volume;

    protected function setUp()
    {
        $this->volume = new Volume;
    }

    public function testCountRegisteredUnits()
    {
        $this->assertEquals([
            new CentiLiter,
            new Liter,
            new MilliLiter,
        ],$this->volume->getUnits());
    }
}
