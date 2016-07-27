file:///home/heitor/programming/php/manual/php-chunked-xhtml/language.oop5.autoload.html

<?php

spl_autoload_register(function ($class_name) {
  include $class_name . '.php';
});


// filenames must match class names
$obj = new MyClass1();
$obj2 = new MyClass2();

$obj2->hello();
