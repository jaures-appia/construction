<?php 
require '../traitement/database.php';

if ($_POST) {

	$id = $_POST['id_fournisseur'];
	$nom = $_POST['nom'];
	$username = $_POST['username'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$adresse = $_POST['adresse'];
	$description = $_POST['description'];
	$actualite = $_POST['actualite'];
	$pwd = $_POST['pwd'];

	;

	$update = $bdd->prepare("UPDATE fournisseurs SET username = ?, password = ?, nom = ?, adresse = ?, email = ?, contact = ?, description = ?, actualite = ? WHERE id_fournisseur = ?");
	$update->execute(array($username, $pwd, $nom, $adresse, $email, $contact, $description, $actualite, $id));

	header("location: profil-fournisseur.php");
}

 ?>