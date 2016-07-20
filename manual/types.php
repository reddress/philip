<a href="file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.intro.html">file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.intro.html</a>

<pre>
PHP supports eight primitive types

4 scalar types
 boolean - true, false (case-insensitive, but by PSR-2, use lowercase)
 integer
 float (a double)
 string

2 compound types
 array
 object

2 special types
 resource
 NULL

</pre>

<p>
  To check the type and value of an expression, use var_dump();
</p>
<?php
  var_dump([1, 2, 3000]);
?>

<p>
  For a human-readable result, use gettype()
</p>
<?php
$s = "Hello";
echo "$s is a " . gettype($s);
?>

<p>
  To check for a type, use is_type functions, such as is_string()
</p>

<p>
  To convert a variable, cast it or use settype()
</p>

<pre>
file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.null.html

NULL is the only possible value of the type 'null'.

A variable is null if it has been assigned NULL, if it has has not been
set to any value, or if it has been unset().

