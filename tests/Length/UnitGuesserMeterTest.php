<?php


namespace Nkootstra\UnitConversion\Tests\Length;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Length\Meter;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserMeterTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortMeter()
    {
        $unit = $this->guess->guess('2,5 x 5 m');

        $this->assertInstanceOf(Meter::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessMeter()
    {
        $unit = $this->guess->guess('6 meter');

        $this->assertInstanceOf(Meter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMeter2()
    {
        $unit = $this->guess->guess('6 meters');

        $this->assertInstanceOf(Meter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMeter3()
    {
        $unit = $this->guess->guess('6 meter(s)');

        $this->assertInstanceOf(Meter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMetre4()
    {
        $unit = $this->guess->guess('6 metre');

        $this->assertInstanceOf(Meter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMeter5()
    {
        $unit = $this->guess->guess(',7 meter');

        $this->assertInstanceOf(Meter::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testMeterWithDefault()
    {
        $test = $this->guess->guess('8,0 cim', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }
}

