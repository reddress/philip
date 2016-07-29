<?php

namespace Foo;

class FooClass {
  public function nameLen() {
    echo "My name is " . strlen($this->name) . " characters long.";
  }

  public function setName($newName) {
    $this->name = $newName;
  }
}

$f = new FooClass();

$f->setName("John");

$f->nameLen();
