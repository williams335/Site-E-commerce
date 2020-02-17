<?php
session_start();

include('connect.php');
$jeux = $bdd->query('SELECT * FROM jeux');


if(isset($_GET['id']) AND $_GET['id'] > 1) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM clients WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>


<?php echo "Vous voulez aller à l'accueil ? Alors <a href=\"index.php\">Accueil</a>"?>


    





<html>
   <head>
	  <meta charset="utf-8">
      <title>Bienvenue <?php echo $userinfo['pseudo']; ?></title>
      
	  <link rel="stylesheet" type="text/css" href="style/style.css" />
   </head>
   <body>
      <div align="center" id="banner1">
         <h2>Bienvenue <?php echo $userinfo['pseudo']; ?></h2>  
         <br /><br />
         <div id="menu">
				<ul>
					<li><a href="index1.php">ACCUEIL</a></li>
					<li><a href="editionreservationsadmin.php">RESERVATIONS</a></li>
					<li><a href="Recherche.php">RECHERCHE</a></li>
					<li><a href="deconnexion.php">DECONNEXION</a></li>
				</ul>
			</div>
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <?php
         }
         ?>

<div id="site">
			
			<div id="banner2">
			</div>

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
      </div>
   </body>
</html>
<?php   
}else if (isset($_GET['id']) AND $_GET['id']= 1)
{
	header('Location: admin1.php');
}
?>