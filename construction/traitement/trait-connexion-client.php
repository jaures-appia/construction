<?php 
session_start();

require 'database.php';

$email = $pwd = '';
$_SESSION['conect_cl'] = '';
$isSuccess = $_SESSION['clientSuccess'] = false;

if ($_POST) {
	
	$email = police($_POST['email']);
	$pwd = police($_POST['pwd']);

	// echo $email."  ".$pwd;

	if (!empty($email)) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$_SESSION['conect_cl'] = "nom d'utilisateur ou mot de passe incorrect";
		$isSuccess = false;}else{
			$isSuccess = true;}
		}else{
			$isSuccess = false;
			$_SESSION['isSuccess'] = true;
			$_SESSION['conect_cl'] = "nom d'utilisateur ou mot de passe incorrect";
			header("location: ../connexion-client.php");
		}

		if (!empty($pwd)) {
			$isSuccess = true;
		}else{
			$isSuccess = false;
			$_SESSION['clientSuccess'] = true;
			$_SESSION['conect_cl'] = "nom d'utilisateur ou mot de passe incorrect";
			header("location: ../connexion-client.php");
		}


	// 	if ($isSuccess) {
	
	// $query = $bdd->prepare("SELECT * FROM client WHERE email = ? AND password = ?");
	// $query->execute(array($email, $pwd));
	// $client = $query->fetch();
	// $recup = $query->rowcount();

	// if ($recup == 1) {
		

	// $_SESSION['id_client'] = $client['id_client'];
	// $_SESSION['nom_client'] = $client['nom'];
	// $_SESSION['prenom_client'] = $client['prenom'];

	// header("location: ../client.php");
	// }
	
	// }
}



if ($isSuccess) {
	
	$query = $bdd->prepare("SELECT * FROM client WHERE email = ? AND password = ?");
	$query->execute(array($email, $pwd));
	$client = $query->fetch();
	$recup = $query->rowcount();

	if ($recup == 1) {
		

	$_SESSION['id_client'] = $client['id_client'];
	$_SESSION['nom_client'] = $client['nom'];
	$_SESSION['prenom_client'] = $client['prenom'];
	$_SESSION['email_client'] = $client['email'];
	// $_SESSION['email_client'] = $client['email'];

	header("location: ../client.php");
	}
	
}




function police($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}

// header("location: ../connexion.php");
 ?>