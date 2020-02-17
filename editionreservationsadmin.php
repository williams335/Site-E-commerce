<?php

include('connect.php');


   $jeux = $bdd->query('SELECT * FROM prêts');
   $jeux->execute(array());
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
            <?= $a['Nom'] ?>  <a> - </a>    <?= $a['pseudo'] ?>    <a> - </a>     <?= $a['Date_t'] ?>
         </a>
  
      </li>
      <?php } ?>
   <ul>
</body>
</html>