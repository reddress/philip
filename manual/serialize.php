<?php
class A {
  public $one = 1;
}

$a = new A();
$s = serialize($a);

echo $s;
