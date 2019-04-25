<?php session_start(); 

if ($_SESSION['id_fournisseur']) {

require '../traitement/database.php';

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
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../js/aos-master/dist/aos.css">
</head>
<body class="page-acceuil">

	<!-- #### HEADER ##### -->
	<div class="container-fluid bg-light">
		<nav class="navbar sticky-top navbar-expand-lg navbar-light ">

			<a class="navbar-brand text-center" href="index.php"><span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span></a>
		 
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Acceuil<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link"  href="devis.php">Devis</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="fournisseur.php">Fournisseur</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="client.php">Espace Client</a>
		      </li>

		    </ul>
		  </div>
		  <div>
		  	<ul class="nav">
		  		<li class="nav-item">
		       <?php if($_SESSION['id_fournisseur']){ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='profil-fournisseur.php'>".$_SESSION['username']."</a> "; }else{ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='connexion.php'>CONNEXION</a>"; } ?> 
		      </li>
		       <li class="nav-item">
		       	<?php if($_SESSION['id_fournisseur']){ echo " <a class='nav-link btn btn-sm btn-danger' href='traitement/deconnexion.php'>DECONNEXION</a>"; }else{ echo " <a class='nav-link btn btn-sm btn-primary' href='inscription.php'>INSCRIPTION</a>"; } ?> 
		        
		      </li>
		  	</ul>
		  </div>
		   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		</nav>
	</div>

	<!-- ##### BODY ##### -->

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

				<p><?php echo $_SESSION['commandeSuccess']; ?></p>
				<form method="post" action="">
					<div class="row">
						<div class="col-lg-12">
							<label for="commande" class="bold">Passer votre commande</label>
							<textarea type="text" name="commande" id="commande" class="form-control"></textarea>
							<input type="text" name="id_fournisseur" value="<?php echo $affich['id_fournisseur'] ?>" hidden>
							<input type="text" name="id_client" value="<?php echo $_SESSION['id_client'] ?>" hidden>
							<input type="number" name="statu" value="0" hidden="">
						</div>
						<div class="col-lg-4 mb-5 mt-2">
							<input type="submit" value="COMMANDER" class="btn btn1 btn-lg btn-block disabled">
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