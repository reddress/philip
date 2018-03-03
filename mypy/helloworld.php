<?php
echo(exec('whoami'));
?>

<pre><?php


// get name from query string, save file, and call python

if (isset($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = "World";
}

$PYTHON = "/usr/bin/python3";

$pyScript = "
def hello(name):
    print('Hello my name is', name)

def main():
    hello('$name')
";

// append standard "main" function

$pyScript .= "
if __name__ == '__main__':
    main()
";

$timestamp = date('YmdHis');
$folder = "data";
$title = "hello";

$filename = "$folder/{$title}_{$timestamp}.py";
     
file_put_contents($filename, $pyScript);

system("$PYTHON $filename");
?>
