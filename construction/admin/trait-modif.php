<?php 
require '../traitement/database.php';

$id = $username = $pwd = $nom = '';

if ($_POST) {
	
	$id = $_POST['id_fournisseur'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$nom = $_POST['nom'];


	$update = $bdd->prepare("UPDATE fournisseurs SET username = ?, password = ?, nom = ? WHERE id_fournisseur = ?");
	$update->execute(array($username, $pwd, $nom, $id));

	header("location: index.php");
}

 ?>