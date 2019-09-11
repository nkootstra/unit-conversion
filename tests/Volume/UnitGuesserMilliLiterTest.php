<?php

namespace Nkootstra\UnitConversion\Tests\Volume;

use Nkootstra\UnitConversion\Unit\Volume\{MilliLiter};
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserMilliLiterTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortMilliliter()
    {
        $unit = $this->guess->guess('2,5 x 5 ml');

        $this->assertInstanceOf(MilliLiter::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessMilliliter()
    {
        $unit = $this->guess->guess('6 milliliter');

        $this->assertInstanceOf(MilliLiter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliliter2()
    {
        $unit = $this->guess->guess('6 milliliters');

        $this->assertInstanceOf(MilliLiter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliliter3()
    {
        $unit = $this->guess->guess('6 milliliter(s)');

        $this->assertInstanceOf(MilliLiter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMillilitre4()
    {
        $unit = $this->guess->guess('6 millilitre');

        $this->assertInstanceOf(MilliLiter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }
}
