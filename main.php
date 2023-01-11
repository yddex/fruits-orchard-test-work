<?php
require_once 'src/Serial.php';
require_once 'src/Models/Trees/FruitTree.php';
require_once 'src/Models/Trees/AppleTree.php';
require_once 'src/Models/Trees/PearTree.php';
require_once 'src/Models/Fruits/Fruit.php';
require_once 'src/Models/Fruits/Apple.php';
require_once 'src/Models/Fruits/Pear.php';
require_once 'src/Models/Orchard.php';



$orchard = new Orchard();

//Apple Tree init
for($i = 0; $i < 10; $i++)
{
    $orchard->plant(new AppleTree());
}

//Pear Tree init
for($i = 0; $i < 15; $i++)
{
    $orchard->plant(new PearTree());
}


$harvest = $orchard->harvest();

echo 'Яблок собрано ' . count($harvest['AppleTree']) . '. Общий вес ' . $harvest['AppleTree']['weight'] .'г'. PHP_EOL;
echo 'Груш собрано ' . count($harvest['PearTree']) . '. Общий вес ' . $harvest['PearTree']['weight'] .'г'. PHP_EOL;

