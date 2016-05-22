<?php
class Cls {
  public function f() {
    var_dump(__CLASS__);
  }
}

$c = new Cls();
$c->f();
?>
