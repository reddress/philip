<?php

$dsn = "mysql:host=localhost;dbname=experimental-cli-php";

$username = 'root';
$password = '';
$options = ["PDO::MYSQL_ATTR_INIT_COMMAND" => "SET NAMES utf8"];

$dbh = new PDO($dsn, $username, $password, $options);

$dbh->exec("create table scientist
  (discipline varchar(32),
   name varchar(32));");

echo "OK";
?>
