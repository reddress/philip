<?php

error_reporting(E_ALL);

$c = "Hello";
echo($c);

function f() {
  $k = "Ken";
  echo($k);
  echo($c);
}

f();
echo($z);

?>
