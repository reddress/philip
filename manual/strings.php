<pre>
A string is a series of characters where a character is a byte. PHP does not offer native Unicode support.

The upper limit of a string is 2 GB

In a single-quoted string literal, only \' and \\ are meaningful escape sequences.

In a double-quoted string, variable names are expanded and several escape sequences are interpreted, such as \n, \r, \t and \$. In PHP 7.0.0, \u00ff outputs the codepoint's UTF-8 representation. Escaping other characters results in the backslash being printed too.

Heredocs

<?php
  $hello = "Hey there.";

  $bar = <<<_EOT
a heredoc
string

heredocs can interpret variables: $hello $hello
_EOT;

  echo $bar;
?>


The closing identifier must be in the first column of its line and end with a semicolon.

A heredoc is like a double-quoted string, while a nowdoc is like a single-quoted string.

A nowdoc is written much like a heredoc, but its identifier is enclosed in single quotes.

  <?php
    $my_nowdoc = <<<'_END'
  a nowdoc

  $not_interpreted
_END;

  echo $my_nowdoc;
?>

Simple syntax for variable parsing:

$juice = "apple";

"He drank some $juice juice."

"He drank juice made of ${juice}s." // curly braces denote variable name

<?php
$juices = array("apple", "koolaid" => "purple");

echo "Simple: He drank some $juices[koolaid] juice.";
echo "\n\n";
echo "Complex: He drank some {$juices['koolaid']} juice.";
?>

  <?php
  class FooCurly
  {
    var $bar = "I am bar";
  }

  $foo = new FooCurly();
  $bar = 'bar';
  $baz = ['foo', 'bar', 'baz'];
  echo "{$foo->$baz[1]}";
  ?>

  <?php
  class beers {
    const softdrink = 'rootbeer';
    public static $ale = 'ipa';
  }

  $rootbeer = 'A & W';
  $ipa = "Alex Keith's";

  echo "I'd like a {${beers::softdrink}}";
?>
