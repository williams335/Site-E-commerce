<?php
session_start();

include('connect.php');
$jeux = $bdd->query('SELECT * FROM jeux');
?>

<!DOCTYPE html>
<html>
<head>
   <title>Accueil</title>
   <meta charset="utf-8">
</head>
<body>
   <ul>
      <?php while($a = $jeux->fetch()) { ?>
      <li>
         <a href="article.php?Nom=<?= $a['Nom'] ?>">
            <img src="miniatures/<?= $a['Nom'] ?>.jpg"width="100" /><br />
            <?= $a['Nom'] ?>
         </a>
          | <a href="reserver.php?Nom=<?= $a['Nom'] ?>">RESERVER</a> 
      </li>
      <?php } ?>
   <ul>
</body>
</html>