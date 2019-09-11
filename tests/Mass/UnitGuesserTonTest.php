<?php


namespace Nkootstra\UnitConversion\Tests\Mass;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Mass\Ton;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserTonTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortTon()
    {
        $unit = $this->guess->guess('2,5 x 5 t');

        $this->assertInstanceOf(Ton::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessTon()
    {
        $unit = $this->guess->guess('6 ton');

        $this->assertInstanceOf(Ton::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessTon2()
    {
        $unit = $this->guess->guess('6 tons');

        $this->assertInstanceOf(Ton::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessTon3()
    {
        $unit = $this->guess->guess('6 ton(s)');

        $this->assertInstanceOf(Ton::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessTon4()
    {
        $unit = $this->guess->guess(',7 ton');

        $this->assertInstanceOf(Ton::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testTonWithDefault()
    {
        $test = $this->guess->guess('8,0 to', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }

}
