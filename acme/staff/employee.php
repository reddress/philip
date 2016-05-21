<?php

namespace Acme\Staff;
use Acme\Fun;

class Employee {
  public $name = "An Employee";

  public function registerTime() {
    $u = new Fun();
    echo $u->capitalize($this->name);
    echo $this->name . " registered now";
  } 
}
