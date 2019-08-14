<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\UnitConversion;
use PHPUnit\Framework\TestCase;

class UnitConversionTest extends TestCase
{
    private $conversion;

    public function setUp()
    {
        $this->conversion = new UnitConversion;
    }

    /** @test */
    public function countLoadedUnits()
    {
        $this->assertTrue(true);
        //$this->assertCount(1, $this->conversion->getUnits());
    }
}
