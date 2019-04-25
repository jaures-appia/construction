<?php 
session_start();

require 'database.php';


$nom = $prenom = $tel = $email = $addresse = $compagnie = $pwd = $confpwd = '';

$_SESSION['nom'] = $_SESSION['prenom'] = $_SESSION['tel'] = $_SESSION['email'] = $_SESSION['addresse'] =  $_SESSION['pwd'] = $_SESSION['confpwd'] = $_SESSION['inscritSuccess'] = '';
$_SESSION['compagnie'] = 'si vous etes une compagnie ou tout autre, veuillez nous le préciser ici';

$isSuccess = $_SESSION['isEr'] = false;

if ($_POST) {
	
	$nom = police($_POST['nom']);
	$prenom = police($_POST['prenom']);
	$tel = police($_POST['tel']);
	$email = police($_POST['email']);
	$addresse = police($_POST['addresse']);
	$compagnie = police($_POST['compagnie']);
	$pwd = police($_POST['pwd']);
	$confpwd = police($_POST['confpwd']);

	if (!empty($nom)) {

		if (strlen($nom) < 2) {
		$_SESSION['nom'] = "le champ est trop cout, entrer au moins deux caractere";
		$isSuccess = false;}else{
			$isSuccess = true;
		}
	}else{
		
	$_SESSION['nom'] = "votre nom est important pour vous identifier";
	$isSuccess = false;
	}

	if (!empty($prenom)) {

		if (strlen($prenom) < 2) {
		$_SESSION['prenom'] = "le champ est trop cout, entrer au moins deux caractere";
		$isSuccess = false;}else{
			$isSuccess = true;
		}
	}else{
		
	$_SESSION['prenom'] = "votre prénom est important pour vous identifier";
	$isSuccess = false;
	}

	if (!empty($tel)) {

		if (!preg_match('/([0-9]{8,8})/', $tel)) {
		$_SESSION['tel'] = "le telephone n'est pas valide";
		$isSuccess = false;}else{
			$isSuccess = true;
		}

	 }else{
		
	$_SESSION['tel'] = "un numero est essentiel pour vous contacter !";
	$isSuccess = false;
	}

	if (!empty($email)) {

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$_SESSION['email'] = "email incorrect !!!";
		$isSuccess = false;}else{
			$isSuccess = true;
		}
	}else{
		
	$_SESSION['email'] = "un email est important pour plus de confidentialté";
	$isSuccess = false;
	}

	if (!empty($compagnie)) {

		$isSuccess = true;
	}else{
		
	$_SESSION['compagnie'] = "votre prénom est important pour vous identifier";
	}

	if (!empty($addresse)) {
			$isSuccess = true;
	}else{
		
	$_SESSION['addresse'] = "votre addresse est important pour vous identifier";
	$isSuccess = false;
	}

	if (!empty($pwd ) && !empty($confpwd)) {

		if ($pwd == $confpwd) {
			$isSuccess = true;
		}else{

			$isSuccess = false;
			$_SESSION['confpwd'] = 'les mots de passe ne sont pas identiques';
		}
	}else{
		
	$_SESSION['pwd'] = "choisisez un mot de passe svp !!!";
	$isSuccess = false;
	}



}



if ($isSuccess) {

	$query = $bdd->prepare("INSERT INTO client (nom, prenom, email, telephone, addresse, nom_compagnie, password) VALUES (?,?,?,?,?,?,?)");
	$query->execute(array($nom, $prenom, $email, $tel, $addresse, $compagnie, $pwd));

	$_SESSION['inscritSuccess'] = 'client enregistre avec success !!!';
	header("location: ../inscription.php");

}else{
	$_SESSION['isEr'] = true;
	header("location: ../inscription.php");
}


function police($data)
 {
 	$data = trim($data);
 	$data = htmlspecialchars($data);
 	$data = stripcslashes($data);

 	return $data;

 }

 ?>