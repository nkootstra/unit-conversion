<?php


namespace Nkootstra\UnitConversion\Tests\Mass;


use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\Unit\Mass\Gram;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserGramTest extends TestCase
{
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser;
    }

    public function testGuessShortGram()
    {
        $unit = $this->guess->guess('2,5 x 5 g');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessShortGram2()
    {
        $unit = $this->guess->guess('2,5 x 5 gr');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(12.5, $unit->getQuantity());
    }

    public function testGuessGram()
    {
        $unit = $this->guess->guess('6 gram');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessGram2()
    {
        $unit = $this->guess->guess('6 grams');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessGram3()
    {
        $unit = $this->guess->guess('6 gram(s)');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessGram4()
    {
        $unit = $this->guess->guess('6 grame');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(6, $unit->getQuantity());
    }

    public function testGuessGram5()
    {
        $unit = $this->guess->guess(',7 gram');

        $this->assertInstanceOf(Gram::class, $unit);
        $this->assertEquals(0.7, $unit->getQuantity());
    }

    public function testGramWithDefault()
    {
        $test = $this->guess->guess('8,0 gri', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(8, $test->getQuantity());
    }

}
