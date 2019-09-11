<?php


namespace Nkootstra\UnitConversion\Tests\Length;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Length\CentiMeter;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserCentiMeterTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortCentiMeter()
    {
        $unit = $this->guess->guess('2,5 x 5 cm');

        $this->assertInstanceOf(CentiMeter::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessCentiMeter()
    {
        $unit = $this->guess->guess('6 centimeter');

        $this->assertInstanceOf(CentiMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessCentiMeter2()
    {
        $unit = $this->guess->guess('6 centimeters');

        $this->assertInstanceOf(CentiMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessCentiMeter3()
    {
        $unit = $this->guess->guess('6 centimeter(s)');

        $this->assertInstanceOf(CentiMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessCentiMetre4()
    {
        $unit = $this->guess->guess('6 centimetre');

        $this->assertInstanceOf(CentiMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessCentiMeter5()
    {
        $unit = $this->guess->guess(',7 centimeter');

        $this->assertInstanceOf(CentiMeter::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testCentiMeterWithDefault()
    {
        $test = $this->guess->guess('8,0 cim', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }
}

