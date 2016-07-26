<a href="file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.boolean.html">file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.boolean.html</a>

<p>
  The following values are considered False:

</p>

<pre>
the boolean false
the integer 0
the float 0.0
the empty string "" and "0"
an array with zero elements
the special type NULL
unset variables
SimpleXML objects created from empty tags
</pre>

<?php
if (!"") {
  echo "negated an empty string ''";
}
?>

<br><br>

<?php
class Foo
{
  public $var1 = "Hello";
  function do_foo()
  {
    echo "do foo";
  }
}

class Bar
{

}


$f = new Foo;
if ($f) {
  echo "check for instance (object) of Foo returned True";
}

?>
<p>
  <?php
  $b = new Bar;
  if ($b) {
    echo "check for instance of Bar returned True";
  }
  ?>
</p>

<?php
var_dump((bool) 1);
?>
