<?php
session_start();

include('connect.php');
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_nom = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM jeux WHERE Nom = ?');
   $edit_article->execute(array($edit_nom));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : le jeux n\'existe pas...');
   }
}
if(isset($_POST['article_nom'], $_POST['article_ages'], $_POST['article_type'], $_POST['article_description'])) 
{
   
      
      $article_nom = htmlspecialchars($_POST['article_nom']);
      $article_ages = htmlspecialchars($_POST['article_ages']);
	  $article_type = htmlspecialchars($_POST['article_type']);
	  $article_description = htmlspecialchars($_POST['article_description']);
	  $NbJeux = htmlspecialchars($_POST['article_nbjeux']);
	  $NbJeuxDispos = htmlspecialchars($_POST['article_nbjeuxdispos']);
      if($mode_edition == 0) 
	  {
         // var_dump($_FILES);
         // var_dump(exif_imagetype($_FILES['miniature']['tmp_name']));
         $ins = $bdd->prepare('INSERT INTO jeux (Nom, Ages, TypeJeux, Description) VALUES (?, ?, ?, ?)');
         $ins->execute(array($article_nom, $article_ages, $article_type, $article_description));
         $lastid = $_POST['article_nom'];
         
         if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) 
		 {
            if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
               $chemin = 'miniatures/'.$lastid.'.jpg';
               move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
            } else {
               $message = 'Votre image doit être au format jpg';
            }
         }
         $message = 'Votre article a bien été posté';
      } else {
         $update = $bdd->prepare('UPDATE jeux SET Nom = ?, Ages = ?, TypeJeux = ?, Description = ? WHERE Nom = ?');
         $update->execute(array($article_nom, $article_ages, $article_type, $article_description, $edit_nom));

         $insertmbr1 = $bdd->prepare("INSERT INTO jeuxludothèque(Nom) VALUES(?)");
         $insertmbr1->execute(array($article_nom));

		 $insertmbr2 = $bdd->prepare("UPDATE jeuxludothèque SET NbJeux = ?, NbJeuxDispos = ? WHERE Nom = ?");
         $insertmbr2->execute(array($NbJeux, $NbJeuxDispos, $article_nom));

         header('Location: article.php?Nom='.$edit_nom);
         $message = 'Votre article a bien été mis à jour !';
      }
   } 
   
else {
      $message = 'Veuillez remplir tous les champs';
   }

?>
<!DOCTYPE html>
<html>
<head>
   <title>Rédaction / Edition</title>
   <meta charset="utf-8">
</head>
<body>
   <form method="POST" enctype="multipart/form-data">
      <input type="text" name="article_nom" placeholder="Nom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['Nom'] ?>"<?php } ?> /><br /><br />
	  <input type="int" name="article_ages" placeholder="Age"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['Ages'] ?>"<?php } ?> /><br /><br />
      <input type="text" name="article_type" placeholder="Type de Jeux"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['TypeJeux'] ?>"<?php } ?> /><br /><br />
      <textarea name="article_description" placeholder="description de l'article"><?php if($mode_edition == 1) { ?><?= 
      $edit_article['Description'] ?><?php } ?></textarea><br /><br />

      <input type="int" name="article_nbjeux" placeholder="Nombre de jeux"/><br /><br />
      
      <input type="int" name="article_nbjeuxdispos" placeholder="Nombre de jeux disponible" /><br /><br />
	  
      <?php if($mode_edition == 0) { ?>
      <input type="file" name="miniature" /><br /><br />
      <?php } ?>

      
      <input type="submit" value="Envoyer l'article" />
   </form>
   <br />
   <?php if(isset($message)) { echo $message; } ?>
</body>
</html>