<?php 
session_start();
require 'database.php';

$commande = $client = $fournisseur = $statu = $_SESSION['commandeSuccess'] = $_SESSION['commandeEr'] = '';

if ($_POST) {
	
	$commande = police($_POST['commande']);
	$client = $_POST['id_client'];
	$fournisseur = $_POST['id_fournisseur'];
	$statu = $_POST['statu'];


	if (empty($commande)) {
		$_SESSION['commandeEr'] = 'passer votre commande';
		header("location: ../voir-fournisseur.php");
	}else{
		$insert = $bdd->prepare("INSERT INTO commande (id_client, id_fournisseur, description, statu) VALUES (?,?,?,?) ");
		$insert->execute(array($client, $fournisseur, $commande, $statu));

		$_SESSION['commandeSuccess'] = "Votre commande a bien été enregistré votre fournisseur vous contactera pour plus d'information";
		header("location: ../client.php");
	}
}

function police($var){

	$var = trim($var);
	$var = htmlspecialchars($var);
	$var = stripcslashes($var);

	return $var;
}


 ?>
