<?php

require("db_config.php");
require("connect.php");
$dbh = connect($db_credentials);

?>
Wordnet dictionary

<form method="GET">
    <input type="text" name="w" autofocus>
    <input type="submit">
</form>

<?php
if (isset($_GET['w'])) {
    $word = str_replace(" ", "_", $_GET['w']);
    $search_sql = "
SELECT g.gloss FROM wn_gloss as g inner join wn_synset as s on g.synset_id = s.synset_id WHERE s.word = :word
";
    
    $stmt = $dbh->prepare($search_sql);
    $stmt->execute([':word' => $word]);
    $all_rows = $stmt->fetchAll();

    // print_r($all_rows);
    
    ?>

    <h3><?= $_GET['w'] ?></h3>
    
    <ul>

    <?php
    foreach ($all_rows as $row) {
    ?>
        
        <li><?= $row['gloss'] ?></li>
        
    <?php
    }
    ?>
        
    </ul>
    
<?php    
}
?>

<table>
    
