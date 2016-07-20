<pre>

file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.callable.html

call_user_func() or usort() accept user-defined callback functions as
a parameter.

A function is passed by its name as a string. Language constructs may
not be used, such as array(), echo, empty(), eval(), isset(), print, and unset().

A method is passed as an array containing the object at index 0 and the
method name at index 1.

Static methods are passed as an array also, with the class name at index
0 and method name at index 1. "ClassName::methodName" also works.

call_user_func('my_callback_function');

call_user_func(array('MyClass', 'myCallBackMethod'));

call_user_func(array($obj, 'myCallBackMethod'));

Objects implementing __invoke can be used as callables:

class C {
  public function __invoke($name) {
    echo "Hello $name";
  }
}

$c = new C();
call_user_func($c, "PHP!");

Example of a closure

$double = function($a) {
  return $a * 2;
}

$numbers = range(1, 5);

$new_numbers = array_map($double, $numbers);

print implode(" ", $new_numbers);

