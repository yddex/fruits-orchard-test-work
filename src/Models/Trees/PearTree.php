<?php

class PearTree extends FruitTree
{
    public function getFruit() :Fruit
    {
        return new Pear();
    }

    protected function setFruitfullnes() :void
    {
        $this->minFruitfulness = 0;
        $this->maxFruitfulness = 20;
    }
}