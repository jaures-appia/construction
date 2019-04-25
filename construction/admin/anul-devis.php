<?php 
require '../traitement/database.php';

if ($_GET) {
	
	$id = $_GET['id_devis'];


	$anul = $bdd->prepare("UPDATE devis SET statu = '2' WHERE id_devis = ?");
	$anul->execute(array($id));

	header("location: index.php");
}

 ?>