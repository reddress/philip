<pre>
<?php

$a = array("a", "b");

$b = $a;

$b[0] = "z";

// arrays are copied 
var_dump($a);
var_dump($b);

$aa = array("apple", "banana");
$bb = array(1 => "banana", 0 => "apple");
$cc = array(0 => "apple", 1 => "banana");

echo $cc === $aa;
var_dump($bb === $aa);

var_dump($aa);
var_dump($bb);
