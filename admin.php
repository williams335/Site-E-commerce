<?php

session_start();

include('connect.php');
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
	if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
		  $confirme = (int) $_GET['confirme'];
		  $req = $bdd->prepare('UPDATE clients SET confirme = 1 WHERE id = ?');
		  $req->execute(array($confirme));
	   }
	if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
		  $supprime = (int) $_GET['supprime'];
		  $req = $bdd->prepare('DELETE FROM clients WHERE id = ?');
		  $req->execute(array($supprime));
	   }
}
$clients = $bdd->query('SELECT * FROM clients');
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
			   <?php while($m = $clients->fetch()) { ?>
               <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - <a href="admin.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="admin.php?type=membre&supprime=<?= $m['id']?>">Supprimer</a></li><br /><br /><br /><br />
               <?php } ?>
			   
            </ul>
         </div>
         <br />
      </div>

   <br /><br />
     <?php echo "Voulez-vous vous déconnecter ? Alors  <a href=\"deconnexion.php\">Déconnexion</a>"?>



		</div>
       
	
</body>
</html>