<?php
trait A {
  public function smallTalk() {
    echo 'a';
  }
}

trait B {
  public function smallTalk() {
    echo 'b';
  }
}

trait C {
  public function smallTalk() {
    echo 'c';
  }
}

class Talker {
  use A, B, C {
    C::smallTalk insteadof A, B;
  }
}

$t = new Talker();
$t->smallTalk();
?>
