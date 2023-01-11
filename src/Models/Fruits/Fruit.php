<?php

abstract class Fruit
{
    protected string $weight;
    
    public function __construct()
    {
        $this->setWeight();
    }

    /**
     * Set weight
     * @return void
     */
    abstract protected function setWeight(): void;


    /**
     * Get the value of weight
     *
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }
}