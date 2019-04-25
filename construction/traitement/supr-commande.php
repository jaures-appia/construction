<?php 
require 'database.php';

if ($_GET) {
	$id = $_GET['id'];

	$supr = $bdd->prepare("UPDATE commande SET statu = 2 WHERE id_commande = ?");
	$supr->execute(array($id));

	header("location: ../client.php");
}

 ?>