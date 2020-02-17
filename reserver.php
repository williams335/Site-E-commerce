<?php

include('connect.php');
include('article.php');

if(isset($_POST['pseudo'])) 
{
   
         $pseudo = htmlspecialchars($_POST['pseudo']);
		 $article = $bdd->prepare('SELECT * FROM prêts WHERE pseudo = ?');
         $article->execute(array($pseudo));
         if($article->rowCount() < 4) {

            $insertmbr1 = $bdd->prepare("INSERT INTO prêts(pseudo, Nom, Date_t) VALUES(?, ?, NOW())");
            $insertmbr1->execute(array($pseudo, $nom));
            $message = 'Votre jeux a bien été reservé !';
   
}else { $message = 'Votre ne pouvez plus réserver de jeux !';
}
}
         
   
?>
<!DOCTYPE html>
<html>
<head>
   <title>Rédaction / Edition</title>
   <link rel="stylesheet" type="text/css" href="style/style.css" />
   <meta charset="utf-8">
</head>
<body>
	<div id="site">
			

			<div id="contenuprincipal">
				<p>
					   <form method="POST" enctype="multipart/form-data">
						  <input type="text" name="pseudo" placeholder="pseudo"/><br /><br />
						  <input type="submit" value="Reserver" />
					   </form>
					   <br />
					   <?php if(isset($message)) { echo $message; } ?>
                		
				</p>
			</div>
			<div id="footer">
				<p>Jeux pour enfants</p>
			</div>
		</div>

</body>
</html>