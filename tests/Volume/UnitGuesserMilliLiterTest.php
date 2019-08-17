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
        $this->guess = new UnitGuesser();
    }

    /** @test */
    public function guess_short_milliliter()
    {
        $liter = $this->guess->guess('2,5 x 5 ml');

        $this->assertInstanceOf(MilliLiter::class, $liter);
        $this->assertEquals(12.5, $liter->getQuantity());
    }

    /** @test */
    public function guess_milliliter()
    {
        $unit = $this->guess->guess('6 milliliter');

        $this->assertInstanceOf(MilliLiter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    /** @test */
    public function guess_milliliter2()
    {
        $liter = $this->guess->guess('6 milliliters');

        $this->assertInstanceOf(MilliLiter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }

    /** @test */
    public function guess_milliliter3()
    {
        $liter = $this->guess->guess('6 milliliter(s)');

        $this->assertInstanceOf(MilliLiter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }

    /** @test */
    public function guess_milliliter4()
    {
        $liter = $this->guess->guess('6 millilitre');

        $this->assertInstanceOf(MilliLiter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }
}
