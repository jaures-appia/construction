<?php 
session_start();

require 'database.php';

$select = $bdd->query("SELECT * FROM devis ORDER BY id_devis DESC");

header("location: ../admin/big-house.php");

 ?>