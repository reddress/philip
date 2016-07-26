<?php

// multi-dimensional arrays

$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "x";
$a[1][1] = "y";
$a[1][2] = "z";
$a[2][0] = "p";
$a[2][1] = "q";

foreach ($a as $v1) {
  foreach ($v1 as $v2) {
    echo "$v2\n";
  }
}
