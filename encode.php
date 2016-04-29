<?php

$str = '82.436822.18:8090';

$encoded = urlencode(base64_encode($str));
$decoded = base64_decode(urldecode($encoded));

echo $encoded;

echo "<br>";
echo base64_decode(urldecode("MTI3LjAuMC4xOjgwMDA%3D"));

function f($x) {

  return 0;
}

function f($x) {
  return 2;
}

