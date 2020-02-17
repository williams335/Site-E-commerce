<meta charset="utf-8" />
<?php

include('connect.php');

$jeux = $bdd->query('SELECT Nom FROM jeux');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $jeux = $bdd->query('SELECT Nom FROM jeux WHERE Nom LIKE "%'.$q.'%"');
   
   
	
	}
   if($jeux->rowCount() == 0) {
      $jeux = $bdd->query('SELECT Nom FROM jeux WHERE CONCAT(Nom, Ages, TypeJeux,Description) LIKE "%'.$q.'%"');
   }

?>
<html>
	<head>
		<title>ACCUEIL</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<meta charset="utf-8">
	</head>
	<body>
			<div id="site">
			<div id="banner1">
				<p>JEUX POUR ENFANTS</p>
			</div>
			<div id="banner2">
			</div>

			<div id="contenuprincipal">
				<p>
						<h2>Rechercher</h2>
						<form method="GET">
						   <input type="search" name="q" placeholder="Recherche..." />
						   <input type="submit" value="Rechercher" />
				        </form>
<?php if($jeux->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $jeux->fetch()) { ?>
      <li><a href="article.php?Nom=<?= $a['Nom'] ?>">
          <img src="miniatures/<?= $a['Nom'] ?>.jpg"width="100" /><br /><?= $a['Nom'] ?></li>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>

		
				</p>
			</div>

			<div id="footer">
				<p>Jeux pour enfants</p>
			</div>
		</div>
</body>
</html>

