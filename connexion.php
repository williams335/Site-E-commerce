<?php
session_start();
include('connect.php');


if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM clients WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mailconnect'] = $userinfo['mailconnect'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail de connexion ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<?php echo "Vous voulez aller à l'accueil ? Alors <a href=\"index.php\">Accueil</a>"?>

    





<html>
   <head>
      <meta charset="utf-8"/>
	  <title>CONNEXION</title>
	  <link rel="stylesheet" type="text/css" href="style/style.css" />
   </head>
   <body>
      <div align="center" id="banner1">
			<p>CONNEXION</p>
		
         <br /><br />
         <form method="POST" action="">
            <table>
               
                  <td align="right">
                     <label for="mailconnect">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Mail" name="mailconnect" 
                  </td>
               </tr>
                  <td align="right">
                     <label for="mdpconnect">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Mot de passe" name="mdpconnect" />
                  </td>
               </tr>
               
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="formconnexion" value="Se connecter" />
					 <?php echo "Vous n'êtes pas encore inscrit ? Alors <a href=\"inscription.php\">inscrivez-vous</a>"?>
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>

