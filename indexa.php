<?php
session_start();

include('connect.php');
$jeux = $bdd->query('SELECT * FROM jeux');
?>
<!DOCTYPE html>
<html>
<head>
   <title>Accueil</title>
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
					   <ul>
						  <?php while($a = $jeux->fetch()) { ?>
						  <li>
							 <a href="article.php?Nom=<?= $a['Nom'] ?>">
								<img src="miniatures/<?= $a['Nom'] ?>.jpg"width="100" /><br />
								<?= $a['Nom'] ?>
							 </a>
							  | <a href="redaction.php?edit=<?= $a['Nom'] ?>">Modifier</a> | <a href="supprimer.php?Nom=<?= $a['Nom'] ?>">Supprimer</a>
						  </li>
						  <?php } ?>
					   <ul>
                </p>
			</div>

			<div id="footer">
				<p>Jeux pour enfants</p>
			</div>
		</div>
</body>
</html>
