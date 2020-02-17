<?php
session_start();

include('connect.php');
$jeux = $bdd->query('SELECT * FROM jeux');
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
			<div id="menu">
				<ul>
					<li><a href="index.php">ACCUEIL</a></li>
					<li><a href="Recherche.php">RECHERCHE</a></li>
					<li><a href="connexion.php">RESERVER</a></li>
					<li><a href="connexion.php">CONNEXION</a></li>
					<li><a href="infos.php">INFOS</a></li>
				</ul>
			</div>
			<div id="banner2">
			</div>

			<div id="contenuprincipal">
				<p>
						<h3><a href="Inscription.php">Incrivez-vous avant toute réservation</a> </h3>


					<h1>Jeux en Stock</h1>
						<ul>
							<?php while($a = $jeux->fetch()) { ?>
							<li>
								<a href="article.php?Nom=<?= $a['Nom'] ?>">
									<img src="miniatures/<?= $a['Nom'] ?>.jpg"width="100" /><br />
									<?= $a['Nom'] ?>
								</a>
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