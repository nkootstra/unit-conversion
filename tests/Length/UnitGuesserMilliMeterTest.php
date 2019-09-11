<?php


namespace Nkootstra\UnitConversion\Tests\Length;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Length\MilliMeter;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserMilliMeterTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortMilliMeter()
    {
        $unit = $this->guess->guess('2,5 x 5 mm');

        $this->assertInstanceOf(MilliMeter::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessMilliMeter()
    {
        $unit = $this->guess->guess('6 millimeter');

        $this->assertInstanceOf(MilliMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliMeter2()
    {
        $unit = $this->guess->guess('6 millimeters');

        $this->assertInstanceOf(MilliMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliMeter3()
    {
        $unit = $this->guess->guess('6 millimeter(s)');

        $this->assertInstanceOf(MilliMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliMetre4()
    {
        $unit = $this->guess->guess('6 millimetre');

        $this->assertInstanceOf(MilliMeter::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliMeter5()
    {
        $unit = $this->guess->guess(',7 millimeter');

        $this->assertInstanceOf(MilliMeter::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testMilliMeterWithDefault()
    {
        $test = $this->guess->guess('8,0 mim', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }
}

