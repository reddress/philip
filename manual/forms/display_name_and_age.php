<?php
error_reporting(E_ALL);
?>

Hi <?= htmlspecialchars($_POST['name']) ?> <br>
You are <?= (int) $_POST['age'] ?> years old
<p>
 Bye  <?php echo htmlspecialchars($_POST['name']); echo $x; ?>
