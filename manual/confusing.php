18 jul 2016

file:///C:/Users/Heitor/Desktop/programming/php/manual/2016_07_18/php-chunked-xhtml/language.types.string.html

Complex (curly) syntax for variable parsing

Note:

Functions, method calls, static class variables, and class constants inside {$} work since PHP 5.

However, the value accessed will be interpreted as the name of a variable in the scope in which the string is defined.

Using single curly braces ({}) will not work for accessing the return values of functions or methods or the values of class constants or static class variables.

<?php
// Show all errors.
error_reporting(E_ALL);

class beers {
    const softdrink = 'rootbeer';
    public static $ale = 'ipa';
}

$rootbeer = 'A & W';
$ipa = 'Alexander Keith\'s';

// This works; outputs: I'd like an A & W
echo "I'd like an {${beers::softdrink}}\n";

// This works too; outputs: I'd like an Alexander Keith's
echo "I'd like an {${beers::$ale}}\n";
?>
