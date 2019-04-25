<?php 
session_start();

require '../traitement/database.php';

$nom = $username = $pwd = $confpwd = '';

if ($_POST) {
	
	$nom = police($_POST['nom']);
	$username = police($_POST['username']);
	$pwd = police($_POST['pwd']);
	$confpwd = police($_POST['confpwd']);

	// echo $nom." ".$username." ".$pwd." ".$confpwd;

	if ($pwd == $confpwd) {
		$insert = $bdd->prepare("INSERT INTO fournisseurs (username, password, nom) VALUES (?,?,?)");
		$insert->execute(array($username, $pwd, $nom));
		$_SESSION['success'] = 'fournisseur ajouter avec success';
		header("location: ajouter.php");
	}else{
		$_SESSION['er'] = 'les mots de passe ne sont pas identiques';
		header("location: ajouter.php");
	}
}


function police($var){

	$var = trim($var);
	$var = htmlspecialchars($var);
	$var = stripcslashes($var);

	return $var;
}

 ?>