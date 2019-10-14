<?php


namespace Nkootstra\UnitConversion;


use Exception;
use HaydenPierce\ClassFinder\ClassFinder;
use ReflectionClass;

abstract class Base
{
    public const NAMESPACE = 'Nkootstra\UnitConversion\Unit';

    /**
     * @var array
     */
    protected $units = [];

    public function __construct()
    {
        $name = (new ReflectionClass($this))
            ->getShortName();

        $classes = ClassFinder::getClassesInNamespace(self::NAMESPACE . '\\' . $name);

        if (empty($classes))
            throw new Exception('Units missing for ' . $name . '? Incorrect namespace?');

        foreach ($classes as $class) {
            $this->units = array_merge($this->units, [new $class()]);
        }
    }

    /**
     * @return array
     */
    public function getUnits(): array
    {
        return $this->units;
    }

}
