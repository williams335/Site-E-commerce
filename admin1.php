<?php
session_start();

include('connect.php');
$jeux = $bdd->query('SELECT * FROM jeux');
?>





<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Administration</title>
   <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
   <div align="center" id="banner1">
         <h2>Bienvenue admin</h2>  
         <br /><br />
         <div id="menu">
            <ul>
			   <li><a href="admin.php">INSCRIRE</a></li>
			   <li><a href="redaction.php">AJOUTER</a></li>
               <li><a href="indexa.php">JEUX</a></li>
			   <li><a href="editionreservationsadmin.php">PRÊTS</a></li>
               <li><a href="deconnexion.php">DECONNEXION</a></li>
            </ul>
         </div>
         <br />
      </div>
   
   <br /><br /><br /><br /> 

  <div id="contenuprincipal">
				<p>
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
					<h1>Nouveautés à venir</h1>
                </p>
			</div>

			<div id="footer">
				<p>Jeux pour enfants</p>
			</div>
		</div>
   
</body>
</html>