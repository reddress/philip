file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.object.html

<pre>

The new statement instantiates a class (creates a new object)

class foo
{
  function do_foo()
  {
    echo "Doing foo";
  }
}

$f = new foo(); // 'new foo;' is also fine
$f->do_foo();

Converting an object to an 'object' does not modify it. If any other
type is converted to object, a new instance of the built-in stdClass is
created.

Converting NULL to object results in an empty instance.

Converting an array to an object results in the object having properties
named by keys and corresponding values. However, numeric keys will be
accessible only with iteration.
