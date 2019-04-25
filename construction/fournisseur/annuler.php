<?php 
require '../traitement/database.php';

if ($_GET) {

	$id = police($_GET['id']);

	$update = $bdd->prepare("UPDATE commande SET statu = '2' WHERE id_commande = ? ");
	$update->execute(array($id));

	header("location: index.php");

}

function police($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}

 ?>