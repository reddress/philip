<?php

namespace PhilipBrown\Nacho\ECommerce;

use PhilipBrown\Nacho\Nacho;

class Store
{
    public static $n;

    public function __construct()
    {
        static::$n = new Nacho();
    }
    
    public function openDoors()
    {
        echo static::$n->hasCheese();
        echo "We are open for business";
    }
}
