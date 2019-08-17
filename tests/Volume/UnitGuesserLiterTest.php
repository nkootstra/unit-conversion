<?php

namespace Nkootstra\UnitConversion\Tests\Volume;

use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Volume\{Liter};
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserLiterTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser();
    }

    /** @test */
    public function guess_short_liter()
    {
        $liter = $this->guess->guess('2,5 x 5 l');

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(12.5, $liter->getQuantity());
    }

    /** @test */
    public function guess_liter()
    {
        $liter = $this->guess->guess('6 liter');

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }

    /** @test */
    public function guess_liter2()
    {
        $liter = $this->guess->guess('6 liters');

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }

    /** @test */
    public function guess_liter3()
    {
        $liter = $this->guess->guess('6 liter(s)');

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }

    /** @test */
    public function guess_liter4()
    {
        $liter = $this->guess->guess('6 litre');

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(6, $liter->getQuantity());
    }

    /** @test */
    public function guess_liter5()
    {
        $liter = $this->guess->guess(',7 liter');

        $this->assertInstanceOf(Liter::class, $liter);
        $this->assertEquals(0.7, $liter->getQuantity());
    }

    /** @test */
    public function transform_incorrect_spelled_unit_to_default()
    {
        $test = $this->guess->guess('8,0 li', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }
}
