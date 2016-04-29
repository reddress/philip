<?php
$a = "1,45,89";
$b = "1,5,89";

$a_arr = explode(",", $a);
$b_arr = explode(",", $b);

$values_in_both = array_intersect($a_arr, $b_arr);

var_dump($values_in_both);
