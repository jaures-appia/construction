<?php 
session_start();

require 'database.php';


$nom = $prenom = $tel = $email = $description = '';

$_SESSION['nomEr'] = $_SESSION['prenomEr'] = $_SESSION['telEr'] = $_SESSION['emailEr'] = $_SESSION['descriptionEr'] = $_SESSION['success'] = '';

$isSuccess = $_SESSION['isEr'] = false;

if ($_POST) {
	
	$nom = police($_POST['nom']);
	$prenom = police($_POST['prenom']);
	$tel = police($_POST['tel']);
	$email = police($_POST['email']);
	$description = police($_POST['description']);

	if (!empty($nom)) {

		if (strlen($nom) < 2) {
		$_SESSION['nomEr'] = "le champ est trop cout, entrer au moins deux caractere";
		$isSuccess = false;}else{
			$isSuccess = true;
		}
	}else{
		
	$_SESSION['nomEr'] = "votre nom est important pour vous identifier";
	$isSuccess = false;
	}

	if (!empty($prenom)) {

		if (strlen($prenom) < 2) {
		$_SESSION['prenomEr'] = "le champ est trop cout, entrer au moins deux caractere";
		$isSuccess = false;}else{
			$isSuccess = true;
		}
	}else{
		
	$_SESSION['prenomEr'] = "votre prénom est important pour vous identifier";
	$isSuccess = false;
	}

	if (!empty($tel)) {

		if (!preg_match('/([0-9]{8,8})/', $tel)) {
		$_SESSION['telEr'] = "le telephone n'est pas valide";
		$isSuccess = false;}else{
			$isSuccess = true;
		}

	 }else{
		
	$_SESSION['telEr'] = "un numero est essentiel pour vous contacter !";
	$isSuccess = false;
	}

	if (!empty($email)) {

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$_SESSION['emailEr'] = "email incorrect !!!";
		$isSuccess = false;}else{
			$isSuccess = true;
		}
	}else{
		
	$_SESSION['emailEr'] = "un email est important pour plus de confidentialté";
	$isSuccess = false;
	}

	if (!empty($description)) {

		$isSuccess = true;
	}else{
		
	$_SESSION['descriptionEr'] = "dite nous sur quoi porte le devis";
	$isSuccess = false;
	}

}



if ($isSuccess) {

	 $select = $bdd->prepare("SELECT * FROM devis WHERE email = ? AND description = ?");
	 $select->execute(array($email, $description));
	 // $query = $select->fetch();
	 $devis = $select->rowcount();

	if ($devis == 0) {

	$query = $bdd->prepare("INSERT INTO devis (nom, prenom, telephone, email, description) VALUES (?,?,?,?,?)");
	$query->execute(array($nom, $prenom, $tel, $email, $description));

	$_SESSION['success'] = 'devis enregistré avec success';
	header("location: ../devis.php");
		// echo "sa marche";
	}else{
	header("location: ../devis.php");
		// echo "sa marche pas dans la base de donnees";
	 }


}else{
	$_SESSION['isEr'] = true;
	header("location: ../devis.php");

	// echo "sa marche pas";
}


function police($data)
 {
 	$data = trim($data);
 	$data = htmlspecialchars($data);
 	$data = stripcslashes($data);

 	return $data;

 }

 ?>