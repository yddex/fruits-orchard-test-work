<?php

abstract class FruitTree 
{
    //register number (uuid)
    protected Serial $serial;
    //fruitfulness parameters
    protected int $minFruitfulness;
    protected int $maxFruitfulness;

    public function __construct(Serial $serial = null)
    {
        $this->serial = $serial ?? Serial::generate();
        $this->setFruitfullnes();
    }

    /**
     * Fruit of this Tree
     * @return Fruit
     */
    abstract public function getFruit(): Fruit;

    /**
     * Harvesting! 
     * @return Fruit[]
     */
    public function harvest() :array
    {
        $countFruits = mt_rand($this->minFruitfulness, $this->maxFruitfulness);
        $basket = [];
        for($i = 0; $i < $countFruits; $i++)
        {
            $basket[] = $this->getFruit();
        }

        return $basket;
    }

    /**
     * Set min and max fruitfulness params
     * @return void
     */
    abstract protected function setFruitfullnes(): void;


    /**
     * Get the value of serial
     *
     * @return Serial
     */
    public function getSerial(): Serial
    {
        return $this->serial;
    }

}