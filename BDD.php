<?php
		$server="e-srvlamp";
		$User="e174915";
		$Pwd="hem23nr";
		$DB="inscription";
		
		$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
		$ident=$_POST['pseudo'];
		$mot=$_POST['mdp'];
		
		$Query = "INSERT INTO `e174915`.`inscription` (`pseudo`, `mdp`) VALUES ($ident,$mot)"; 
		
		
		$Result = $Connect->query($Query);
		
?>