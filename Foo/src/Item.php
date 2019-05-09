<?php


namespace App;


abstract class Item
{
    public $sellIn;
    public $quality;

    public function __construct($sellIn, $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    abstract public function tick();
}