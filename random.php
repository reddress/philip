<?php

// http://stackoverflow.com/questions/36925043/prepared-statement-php5-sqlite3-exceeds-30-seconds-execution-time
$bid = 0;

function bid() {
  $bid = mt_rand(11111,99999);
  if (($bid % 10) === 0) {
    $bid += 123;
  }
}

bid();

// unchanged because $bid inside function is local
// need to return a value
echo $bid;
?>
