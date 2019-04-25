<?php session_start();

require '../traitement/database.php';

if ($_SESSION['id_fournisseur']) {
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
<body class="page-fournisseur">
	
	<!-- #### HEADER ##### -->
	<div class="container-fluid bg-light">
		<nav class="navbar sticky-top navbar-expand-lg navbar-light ">

			<a class="navbar-brand text-center" href="index.php"><span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span></a>
		 
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="../index.php">Acceuil<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link"  href="../devis.php">Devis</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../fournisseur.php">Fournisseur</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../client.php">Espace Client</a>
		      </li>

		    </ul>
		  </div>
		  <div>
		  	<ul class="nav">
		  		<li class="nav-item">
		       <?php if($_SESSION['id_fournisseur']){ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='profil-fournisseur.php'>".$_SESSION['username']."</a> "; }else{ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='connexion.php'>CONNEXION</a>"; } ?> 
		      </li>
		       <li class="nav-item">
		       	<?php if($_SESSION['id_fournisseur']){ echo " <a class='nav-link btn btn-sm btn-danger' href='../traitement/deconnexion.php'><i class='fa fa-sign-out size-2'></i></a>"; }else{ echo " <a class='nav-link btn btn-sm btn-primary' href='inscription.php'>INSCRIPTION</a>"; } ?> 
		        
		      </li>
		  	</ul>
		  </div>
		   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		</nav>
	</div>

	<!-- ##### BODY ##### -->

	<div class="container index client">
		<div class="row">
			<div class="col-12 box-client mb-5">
				<h1 class="text-center bold title-client">Bienvenue <?php echo $_SESSION['username']; ?></h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-10 offset-lg-1 ">
				
				<div class="row box-module">
					<div class="offset-md-4 col-md-3 ">

						<?php 
							$C = $bdd->prepare("SELECT COUNT(id_commande) AS nbCommande FROM commande WHERE id_fournisseur = ?;");
							$C->execute(array($_SESSION['id_fournisseur']));
 							$repC = $C->fetch();
						 ?>
						<i class="bold text-center size-2"><?php echo $repC['nbCommande']; ?></i>
						
						<button class="btn btn-lg btn-warning module" > Nos Commandes</button>

					</div>
				</div>


				<div class="row mt-5 mb-5"  >
					<?php

					$commande = $bdd->prepare("SELECT *, YEAR(dateCommande) AS annee, MONTH(dateCommande) AS mois, DAY(dateCommande) AS jour FROM commande WHERE id_fournisseur = ? ");
					$commande->execute(array($_SESSION['id_fournisseur']));

					while ($afficher = $commande->fetch()) {

						$client = $bdd->prepare("SELECT * FROM client WHERE id_client = ? ");
						$client->execute(array($afficher['id_client']));
						$affich = $client->fetch();
					 ?>
					 	<div class="col-lg-4 mb-2">
					 	<div class="card" style="width: 18rem;">
						  <div class="card-body">
						    <h5 class="card-title">Commande de <?php echo $affich['nom'].' '.$affich['prenom']; ?></h5>
						    <p class="card-text"><?php echo $afficher['description']; ?></p>
						    
						    
						   
						    <?php 

						    	if ($afficher['statu'] == 2) { ?>
						    		  
						    		 <a href='annuler.php?id=<?php echo $afficher['id_commande']; ?>' class='btn btn-sm btn-danger disabled' >commande annuler</a>
						    <?php	}elseif ($afficher['statu'] == 1) {

						     ?>
						    	<a href='valider.php' class='btn btn-sm btn-success disabled'>commande effectuée</a>
						    <?php }else{ ?>
						    	<a href="valider.php?id=<?php echo $afficher['id_commande']; ?>" class="btn btn-sm btn-success">effectué</a>
								<a href="annuler.php?id=<?php echo $afficher['id_commande']; ?>"class="btn btn-sm btn-danger">annuler</a>
							<?php } ?>

							<br><br><span class="size-1 mr-1"><i class="fa fa-phone size-2"></i>  <?php echo $affich['telephone']; ?></span>
							<span class="size-1"><i class="fa fa-envelope size-2"></i>  <?php echo $affich['email']; ?></span>
						  </div>
						</div>
						</div>
					 

						<?php } ?>
				</div>

			</div>
		</div>

	</div>

</body>
</html>

<?php
}else{
	header("location: connexion.php");
	}
 ?>
