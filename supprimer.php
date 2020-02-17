<?php
session_start();

include('connect.php');
if(isset($_GET['Nom']) AND !empty($_GET['Nom'])) {
   $suppr_nom = htmlspecialchars($_GET['Nom']);
   $suppr = $bdd->prepare('DELETE FROM jeux WHERE Nom = ?');
   $suppr->execute(array($suppr_nom));
   header('Location: indexa.php');
}
?>