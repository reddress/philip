<pre>

file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.array.html

An array is actually an ordered map. A map is a type that associates keys and values.

The short array syntax is ["foo" => "bar", "bar" => "foo"]

Keys can be integers or strings. Values can be of any type.

Strings containing valid decimal integers will be cast to an integer.

It is possible to acccess array elements with square and curly braces, that is, [] and {}.

It is possible to array dereference the result of a function or method call directly

function getArray() {
  return array(1, 2, 3);
}

$elem = getArray()[1];

When assigning a value to an array, and the key is omitted, as in

$arr[] = "foo";

the new key will be the maximum of existing integer indices + 1, but also at least 0.

  <?php
    $arr[] = "foo";
  var_dump($arr);
  ?>

Reindexing the array with $array = array_values($array); will reset
the maximum index. unset() does not reindex.

To easily traverse an array, use foreach.

foreach ($colors as $color) {
  echo "Do you like $color?\n";
}

Converting an object to an array results in an array whose elements are
the object's properties. However, keys with prepended class names or *
will have null bytes on either side, and may result in unexpected
behavior.

  <?php
    
    class A {
      private $A;
    }

  class B extends A {
    private $A;
    public $AA;
  }

  var_dump((array) new B());

  ?>

It is possible to change array values directly by passing them by reference.

foreach ($colors as $color) {
  $color = strtoupper($color);
}

To get the number of items in an array, use count($arr).

Array assignment always involves value copying. To copy an array by
reference, use the reference operator.

  <?php

    $arr1 = array(2, 3);
  $arr2 = $arr1;
  $arr2[] = 4;  // $arr1 not modified
  
  $arr3 = &$arr1;
  $arr3[] = 4;  // affects both arr1 and arr3
  ?>

