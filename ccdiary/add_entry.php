<?php

require("db_config.php");
require("connect.php");
$dbh = connect($db_credentials);

$insert_sql = "
INSERT INTO my_ccdiary (amount, ord, type, who, day) VALUES
(:amount, :ord, :type, :who, :day)";

$date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

if ($_POST['amount'] == "" || $_POST['ord'] == "" || $_POST['who'] == "") {
    echo('Please fill out all fields. <a href="index.php">Go back</a>');
} else {
    $stmt = $dbh->prepare($insert_sql);
    $stmt->execute([
        ':amount' => $_POST['amount'],
        ':ord' => $_POST['ord'],
        ':type' => $_POST['type'],
        ':who' => $_POST['who'],
        ':day' => $date,
    ]);

    header("Location: index.php");
}
