<?php
session_start();

include('connect.php');

   
if(isset($_GET['Nom']) AND !empty($_GET['Nom'])) {
   $get_id = htmlspecialchars($_GET['Nom']);
   $article = $bdd->prepare('SELECT * FROM jeux WHERE Nom = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $Nom = $article['Nom'];
      $nom = $article['Nom'];
      $ages = $article['Ages'];
	  $typejeux = $article['TypeJeux'];
	  $description = $article['Description'];
   } else {
      die('Ce jeux n\'existe pas !');
   }
} else {
   die('Erreur');
}
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
				   <img src="miniatures/<?= $Nom ?>.jpg" width="300" />
				   <h1><?= $nom ?></h1>
				   <p><?= $ages ?> ans</p>
				   <p><?= $typejeux ?></p>
				   <p><?= $description?></p>
		
				</p>
			</div>

</body>
</html>