<?php

namespace Nkootstra\UnitConversion\Tests\Volume;

use Nkootstra\UnitConversion\Unit\Volume\{CentiLiter, MilliLiter};
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserCentiLiterTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortCentiliter()
    {
        $unit = $this->guess->guess('2,5 x 5 cl');

        $this->assertInstanceOf(CentiLiter::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessCentiliter()
    {
        $unit = $this->guess->guess('6 x 30cl');

        $this->assertInstanceOf(CentiLiter::class, $unit);
        $this->assertEquals(180, $unit->getQuantity());
    }

    public function testGuessCentiliter2()
    {
        $unit = $this->guess->guess('24 x 50cl');

        $this->assertInstanceOf(CentiLiter::class, $unit);
        $this->assertEquals(1200, $unit->getQuantity());
    }



}
