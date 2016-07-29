<?php

require '../vendor/autoload.php';
use Acme\Models\Widget as W;
use Acme\Models as M;

// $w = new \Acme\Models\Widget();
// $w = new W();

$w = new M\Widget();

echo "Inside src";
echo $w::NAME;
