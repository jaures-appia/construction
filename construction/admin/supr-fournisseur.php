<?php 
require '../traitement/database.php';

if ($_GET) {
	
	$id = $_GET['id_four'];

	$delete = $bdd->prepare("DELETE FROM fournisseurs WHERE id_fournisseur = ?");
	$delete->execute(array($id));

	header("location: index.php");
}

 ?>