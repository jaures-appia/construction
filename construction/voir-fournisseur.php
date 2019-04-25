<?php session_start(); 

if ($_SESSION['id_client']) {

require 'traitement/database.php';

if ($_GET) {
	
	$id = $_GET['id'];


$select = $bdd->prepare("SELECT * FROM fournisseurs WHERE id_fournisseur = ?");
$select->execute(array($id));
$affich = $select->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="page-acceuil">

	<?php include 'header.php'; ?>

	<div class="container client index">
		<div class="row">
				
			<div class="col-12 box-devis mb-5	">
				<h1 class="title-devis bold text-center"><?php echo $affich['nom']; ?></h1>
			</div>
			
		</div>

		<div class="row mt-5">
			<div class="col-lg-5 ">
				<p> <?php echo $affich['nom']; ?> est situé à <span class="bold size-2"><?php echo $affich['adresse']; ?></span></p>
				<p>vous pouvez les contacter <br> <span class="bold size-2"><?php echo $affich['contact']; ?></span> <br> <span class="bold size-2"><?php echo $affich['email']; ?></span></p>
				<p><span class="bold "><?php echo $affich['description']; ?></span></p>
			</div>

			<div class="col-lg-7 ">
				<p class="mb-2"><span class="size-3 bold">"</span><?php echo $affich['actualite']; ?><span class="size-3 bold">"</span></p>

				<form method="post" action="traitement/trait-commande.php">
					<div class="row">
						<div class="col-lg-12">
							<label for="commande" class="bold">Passer votre commande</label>
							<textarea type="text" name="commande" id="commande" class="form-control"></textarea>
							<input type="text" name="id_fournisseur" value="<?php echo $affich['id_fournisseur'] ?>" hidden>
							<input type="text" name="id_client" value="<?php echo $_SESSION['id_client'] ?>" hidden>
							<input type="number" name="statu" value="0" hidden="">
						</div>
						<div class="col-lg-4 mb-5 mt-2">
							<input type="submit" value="COMMANDER" class="btn btn1 btn-lg btn-block">
						</div>
					</div>
				</form>
			</div>

		</div>




	</div>


	

</body>
</html>
<?php }else{
	header("location: connexion-client.php");
} ?>