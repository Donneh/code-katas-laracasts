<?php

namespace App;

class GildedRose
{
    protected static $lookup = [
        'normal' => Normal::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => backstagePass::class,
        'Conjured Mana Cake' => Conjured::class
    ];

    public static function of($name, $quality, $sellIn) {
        $class = isset(static::$lookup[$name]) ? static::$lookup[$name] : Item::class;

        return new $class($sellIn, $quality);
    }
}
