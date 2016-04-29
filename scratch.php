<?php

$re = "/\"[^\"]*\"|\\S+/m"; 
$str = "this is a \"text a s field\" need \"to replace\""; 
$subst = "+$0"; 

$result = preg_replace($re, $subst, $str);

echo $result;
