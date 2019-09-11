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

    public function testGuessShortLiter()
    {
        $unit = $this->guess->guess('2,5 x 5 l');

        $this->assertInstanceOf(Liter::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessLiter()
    {
        $unit = $this->guess->guess('6 liter');

        $this->assertInstanceOf(Liter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessLiter2()
    {
        $unit = $this->guess->guess('6 liters');

        $this->assertInstanceOf(Liter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessLiter3()
    {
        $unit = $this->guess->guess('6 liter(s)');

        $this->assertInstanceOf(Liter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessLitre4()
    {
        $unit = $this->guess->guess('6 litre');

        $this->assertInstanceOf(Liter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessLiter5()
    {
        $unit = $this->guess->guess(',7 liter');

        $this->assertInstanceOf(Liter::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testLiterWithDefault()
    {
        $test = $this->guess->guess('8,0 li', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }
}
