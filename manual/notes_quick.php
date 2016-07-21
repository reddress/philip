<pre>

SCOPE

file:///home/heitor/programming/php/manual/php-chunked-xhtml/language.variables.scope.html

Use 'global' keyword to use an outside variable from inside a function.

A static variable exists only in local function scope, but does not
lose its value when program execution leaves this scope.


TODO Read about references and 'function &someFunction'

Curly braces should be used to avoid ambiguity when indirectly
accessing properties and methods

$foo->$bar['baz'] should be $foo->{$bar['baz']} or {$foo->$bar}['baz']

Variables from HTML forms

file:///home/heitor/programming/php/manual/php-chunked-xhtml/language.variables.external.html

setcookie() and header() must be called before any output is sent to the browser.
