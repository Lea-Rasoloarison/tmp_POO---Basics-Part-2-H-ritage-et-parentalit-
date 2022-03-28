<?php

require_once 'Vehicle.php';

class Camion extends Vehicle
{
    private float $stockCapacity;
    private float $charge;
    private string $energy;
    private int $energyLevel;

    public function __construct(string $color, int $nbSeats, string $energy, float $stockCapacity)
    {
        parent::__construct($color, $nbSeats);
        $this->setEnergy($energy);
        $this->setStockCapacity($stockCapacity);
    }

    public function setEnergy($energy): void
    {
        $this->energy = $energy;
    }

    public function setStockCapacity($stockCapacity): void
    {
        $this->stockCapacity = $stockCapacity;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function getStockCapacity(): float
    {
        return $this->stockCapacity;
    }

    public function chargeStatus(): string
    {
        if($this->charge < $this->getStockCapacity())
        {
            return 'in filling';
        }
        return 'full';
    }

    public function charge($quantity): void
    {
        if($this->chargeStatus() === 'infilling')
        {
            $this->charge += $quantity;
        } else {
            $this->charge = $this->getStockCapacity();
        }
    }

}
