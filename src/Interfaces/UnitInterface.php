<?php


namespace Nkootstra\UnitConversion\Interfaces;


interface UnitInterface
{
    /**
     * Setup unit
     * @param int $quantity
     */
    public function __construct($quantity=1);
}
