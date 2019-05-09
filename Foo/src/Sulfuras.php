<?php


namespace App;


class Sulfuras extends Item
{

    public function __construct($sellIn, $quality)
    {
        parent::__construct($sellIn = 'Never has to be sold.', $quality = 80);
    }

    public function tick()
    {
        // tick
    }
}