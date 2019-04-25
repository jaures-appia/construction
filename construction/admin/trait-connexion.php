<?php 
session_start();

require '../traitement/database.php';

$username = $pwd = '';
$_SESSION['conect'] = '';
$isSuccess = $_SESSION['Success'] = false;

if ($_POST) {
	
	$username = police($_POST['username']);
	$pwd = police($_POST['pwd']);

	if (!empty($username)) {
		$isSuccess = true;
		}else{
			$isSuccess = false;
			$_SESSION['Success'] = true;
			$_SESSION['conect'] = "nom d'utilisateur ou mot de passe incorrect";
			header("location: connexion-admin.php");
		}

		if (!empty($pwd)) {
			$isSuccess = true;
		}else{
			$isSuccess = false;
			$_SESSION['Success'] = true;
			$_SESSION['conect'] = "nom d'utilisateur ou mot de passe incorrect";
			header("location: connexion-admin.php");
		}
}



if ($isSuccess) {
	
	$query = $bdd->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
	$query->execute(array($username, $pwd));
	$result = $query->fetch();

	$_SESSION['id_admin'] = $result['id_admin'];
	$_SESSION['admin'] = $result['username'];

	header("location: index.php");
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