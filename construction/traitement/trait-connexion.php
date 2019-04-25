<?php 
session_start();

require 'database.php';

$username = $pwd = '';
$_SESSION['conectEr'] = '';
$isSuccess = $_SESSION['isSuccess'] = false;

if ($_POST) {
	
	$username = police($_POST['username']);
	$pwd = police($_POST['pwd']);

	if (!empty($username)) {
		$isSuccess = true;
		}else{
			$isSuccess = false;
			$_SESSION['isSuccess'] = true;
			$_SESSION['conectEr'] = "nom d'utilisateur ou mot de passe incorrect";
			header("location: ../fournisseur/connexion.php");
		}

		if (!empty($pwd)) {
			$isSuccess = true;
		}else{
			$isSuccess = false;
			$_SESSION['isSuccess'] = true;
			$_SESSION['conectEr'] = "nom d'utilisateur ou mot de passe incorrect";
			header("location: ../fournisseur/connexion.php");
		}
}



if ($isSuccess) {
	
	$query = $bdd->prepare("SELECT * FROM fournisseurs WHERE username = ? AND password = ?");
	$query->execute(array($username, $pwd));
	$result = $query->fetch();

	$_SESSION['id_fournisseur'] = $result['id_fournisseur'];
	$_SESSION['username'] = $result['username'];

	header("location: ../fournisseur/index.php");
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