<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\Unit\Volume\Liter;
use PHPUnit\Framework\TestCase;

class VolumeLiterTest extends TestCase
{
    /** @test */
    public function liter_name()
    {
        $liter = new Liter;

        $this->assertEquals('liter', $liter->getName());
    }

    /** @test */
    public function liter_units()
    {
        $liter = new Liter;

        $this->assertEquals(1, $liter->getUnits());
    }

    /** @test */
    public function liter_symbols()
    {
        $liter = new Liter;

        $this->assertEquals([
            'l',
            'liter',
            'litre'
        ], $liter->getSymbols());
    }

    /** @test */
    public function liter_base()
    {
        $liter = new Liter;

        $this->assertTrue(true);
        //$this->assertInstanceOf(Volume::class, $liter->getBase());
    }
}
