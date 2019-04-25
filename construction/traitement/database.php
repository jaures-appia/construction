<?php 

$host = 'localhost';
$dbname = 'big_house';
$user = 'root';
$mdp = '';


try {
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;', $user, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}

 ?>