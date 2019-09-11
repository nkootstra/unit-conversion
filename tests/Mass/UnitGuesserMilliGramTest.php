<?php


namespace Nkootstra\UnitConversion\Tests\Mass;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Mass\MilliGram;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserMilliGramTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortMilliGram()
    {
        $unit = $this->guess->guess('2,5 x 5 mg');

        $this->assertInstanceOf(MilliGram::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessMilliGram()
    {
        $unit = $this->guess->guess('6 milligram');

        $this->assertInstanceOf(MilliGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliGram2()
    {
        $unit = $this->guess->guess('6 milligrams');

        $this->assertInstanceOf(MilliGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliGram3()
    {
        $unit = $this->guess->guess('6 milligram(s)');

        $this->assertInstanceOf(MilliGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliGram4()
    {
        $unit = $this->guess->guess('6 milligrame');

        $this->assertInstanceOf(MilliGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessMilliGram5()
    {
        $unit = $this->guess->guess(',7 milligram');

        $this->assertInstanceOf(MilliGram::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testMilliGramWithDefault()
    {
        $test = $this->guess->guess('8,0 mig', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }

}
