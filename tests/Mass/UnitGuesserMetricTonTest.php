<?php


namespace Nkootstra\UnitConversion\Tests\Mass;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Mass\MetricTon;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserMetricTonTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortMetricTon()
    {
        $unit = $this->guess->guess('2,5 x 5 t');

        $this->assertInstanceOf(MetricTon::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessMetricTon()
    {
        $unit = $this->guess->guess('6 ton');

        $this->assertInstanceOf(MetricTon::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMetricTon2()
    {
        $unit = $this->guess->guess('6 tons');

        $this->assertInstanceOf(MetricTon::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMetricTon3()
    {
        $unit = $this->guess->guess('6 ton(s)');

        $this->assertInstanceOf(MetricTon::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMetricTon4()
    {
        $unit = $this->guess->guess(',7 ton');

        $this->assertInstanceOf(MetricTon::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testMetricTonWithDefault()
    {
        $test = $this->guess->guess('8,0 to', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }

}
