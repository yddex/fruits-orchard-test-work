<?php

class Orchard
{
    protected array $orchard;

    /**
     * Construct
     * @param FruitTree[] $orchard array with fruits trees
     */
    public function __construct(array $orchard = [])
    {
        $this->orchard = $orchard;
    }

    /**
     * Plant tree to orchard
     * @param FruitTree $tree
     * @return void
     */
    public function plant(FruitTree $tree)
    {
        $this->orchard[] = $tree;
    }
    

    /**
     * Harvesting from orchard
     * @return array Array with fruits
     */
    public function harvest() :array
    {
        $storage = [];

        //getting fruits and sorting by tree class
        foreach($this->orchard as $tree)
        {   
            $treeClass = get_class($tree);
            if(!isset($storage[$treeClass]))
            {
                $storage[$treeClass] = [];
            }
            array_push($storage[$treeClass], ...$tree->harvest());
        }

        foreach($storage as $treeClass => $fruits)
        {   
            $storage[$treeClass]['weight'] = $this->calculateWeight($fruits);
        }
        return $storage;
    }


    /**
     * Calculate fruits weight
     * @param Fruit[] $fruits
     * @return int weight
     */
    protected function calculateWeight(array $fruits) :int
    {
        $weight = 0;
        foreach($fruits as $fruit)
        {
            $weight += $fruit->getWeight();
        }
        return $weight;
    }


    /**
     * Get the value of orchard
     *
     * @return array
     */
    public function getOrchard(): array
    {
        return $this->orchard;
    }
}