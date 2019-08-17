<?php

namespace Nkootstra\UnitConversion\Tests\Basic;

use Nkootstra\UnitConversion\Unit\Basic\Piece;
use Nkootstra\UnitConversion\UnitGuesser;
use PHPUnit\Framework\TestCase;

class UnitGuesserDefaultTest extends TestCase
{
    /** @var UnitGuesser $guess */
    private $guess;

    public function setUp()
    {
        $this->guess = new UnitGuesser();
    }

    /** @test */
    public function guess_default_piece()
    {
        $test = $this->guess->guess('5 stuks', new Piece);

        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(5, $test->getQuantity());
    }

    /** @test */
    public function guess_default_piece2()
    {
        $test = $this->guess->guess('5 pieces', new Piece);

        $this->assertNotNull($test);
        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(5, $test->getQuantity());
    }

    /** @test */
    public function guess_default_piece3()
    {
        $test = $this->guess->guess('20x éénkops', new Piece);

        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(20, $test->getQuantity());
    }

    /** @test */
    public function guess_without_quantity()
    {
        $test = $this->guess->guess('per set', new Piece);

        $this->assertInstanceOf(Piece::class, $test);
        $this->assertEquals(1, $test->getQuantity());
    }
}
