<?php

namespace Sonjaturo\DuckmodeFilament;

class Bread
{
    public function __construct(protected readonly BreadType $breadEnum)
    {
    }

    public function getHealthValue()
    {
        return match ($this->breadEnum) {
            BreadType::GlutenFree => 3,
            BreadType::Dwarf => -4,
            BreadType::Raisin => 7,
            BreadType::None => 0,
            default => 5
        };
    }

    public function getType(): BreadType
    {
        return $this->breadEnum;
    }
}
