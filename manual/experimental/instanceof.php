<?php

$a = "abc";

var_dump($a instanceof string);  // does not work
var_dump(is_string($a));
