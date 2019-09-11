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

    public function testLoadedUnits()
    {
        // todo
        $this->assertTrue(true);
    }
}
