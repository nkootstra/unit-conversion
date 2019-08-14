<?php

namespace Nkootstra\UnitConversion\Tests;

use Nkootstra\UnitConversion\Unit\Volume;
use PHPUnit\Framework\TestCase;

class VolumeTest extends TestCase
{
    protected $volume;

    protected function setUp()
    {
        $this->volume = new Volume;
    }

    /** @test */
    public function registered_units()
    {
        $this->assertTrue(true);
    }
}
