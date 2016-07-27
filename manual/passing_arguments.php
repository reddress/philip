<pre>
<?php

class Dog {
  public $name;

  public function bark() {
    echo $this->name . " says woof\n";
  }
  
}

$f = new Dog();
$f->name = "fido";

$f->bark();

$g = $f;

$g->name = "gary";

$g->bark();

$f->bark();

function rename_dog($dog, $new_name) {
  $dog->name = $new_name;
}

rename_dog($f, "Fred");

// $f does get modified
$f->bark();

// what about arrays?
function alter_head($arr, $new_value) {
  $arr[0] = $new_value;
}

$a = [100, 200, 300, 400, 500];

alter_head($a, 99);

// array is unaltered
var_dump($a);
