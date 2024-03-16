<?php

namespace Sonjaturo\DuckmodeFilament;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class Duck implements Arrayable
{
    protected string $audioAsset = 'quack';

    protected Bread $bread;

    protected ?string $name = null;

    protected bool $reportMurder = true;

    protected int $starvationRate = 1000;

    public static function make(): static
    {
        return new static(BreadType::White);
    }

    public function __construct(BreadType $breadType)
    {
        $this->bread = new Bread($breadType);
    }

    public function audioAsset(string $audioAsset = 'quack'): self
    {
        $this->audioAsset = $audioAsset;

        return $this;
    }

    public function getAudioAsset(): string
    {
        return $this->audioAsset;
    }

    public function useBread(Bread $bread): self
    {
        $this->bread = $bread;

        return $this;
    }

    public function getBread(): Bread
    {
        return $this->bread;
    }

    public function name(?string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name ?? __('Anonymous');
    }

    public function reportMurder(bool $condition = true): self
    {
        $this->reportMurder = $condition;

        return $this;
    }

    public function getReportMurder(): bool
    {
        return $this->reportMurder;
    }

    public function starvationRate(int $starvationRate = 1000): self
    {
        if ($starvationRate <= 0) {
            throw new \InvalidArgumentException('The starvation rate must be a number of millseconds greater than zero and less than ' . PHP_INT_MAX . '.');
        }

        $this->starvationRate = $starvationRate;

        return $this;
    }

    public function getStarvationRate(): int
    {
        return $this->starvationRate;
    }

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'bread' => $this->getBread()->getHealthValue(),
            'starvationRate' => $this->getStarvationRate(),
            'reportMurder' => $this->getReportMurder(),
            'audioAsset' => $this->getAudioAsset(),
            'slug' => Str::slug($this->getName()),
        ];
    }
}
