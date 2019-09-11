<?php


namespace Nkootstra\UnitConversion\Tests\Mass;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Mass\KiloGram;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserKiloGramTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortKiloGram()
    {
        $unit = $this->guess->guess('2,5 x 5 kg');

        $this->assertInstanceOf(KiloGram::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessKiloGram()
    {
        $unit = $this->guess->guess('6 kilogram');

        $this->assertInstanceOf(KiloGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessKiloGram2()
    {
        $unit = $this->guess->guess('6 kilograms');

        $this->assertInstanceOf(KiloGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessKiloGram3()
    {
        $unit = $this->guess->guess('6 kilogram(s)');

        $this->assertInstanceOf(KiloGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessKiloGram4()
    {
        $unit = $this->guess->guess('6 kilograme');

        $this->assertInstanceOf(KiloGram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessKiloGram5()
    {
        $unit = $this->guess->guess(',7 kilogram');

        $this->assertInstanceOf(KiloGram::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testKiloGramWithDefault()
    {
        $test = $this->guess->guess('8,0 kigr', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }

}
