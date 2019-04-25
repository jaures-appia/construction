<?php 
session_start();

require 'traitement/database.php';

if ($_SESSION['id_client']) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="page-acceuil">
	<?php include 'header.php'; ?>

	<div class="container index client">
		<div class="row">
			<div class="col-12 box-client mb-5">
				<h1 class="text-center bold title-client">Bienvenue <?php echo $_SESSION['nom_client'].' '.$_SESSION['prenom_client']; ?></h1>
			</div>
		</div>

		

		<div class="row " >
			<div class="offset-lg-1 col-lg-10 mt-5 mb-5 ">

				<p class="size-3 bold text-success"><?php echo $_SESSION['commandeSuccess']; ?></p>

				 <div class="row box-module">
					<div class="offset-md-4 col-md-3 ">


						<?php 
							$C = $bdd->prepare("SELECT COUNT(id_commande) AS nbCommande FROM commande WHERE id_client = ?;");
							$C->execute(array($_SESSION['id_client']));
 							$repC = $C->fetch();
						 ?>
						<i class="bold text-center size-2"><?php echo $repC['nbCommande']; ?></i>
						
						<button class="btn btn-lg btn-warning module" > Mes Commandes</button>

					</div>

				</div>

				<div class="row mt-5" id="commande" >
					<?php

					$commande = $bdd->prepare("SELECT *, YEAR(dateCommande) AS annee, MONTH(dateCommande) AS mois, DAY(dateCommande) AS jour FROM commande WHERE id_client = ? ORDER BY id_commande DESC LIMIT 0,3");
					$commande->execute(array($_SESSION['id_client']));

					while ($afficher = $commande->fetch()) {
					 ?>

					
					 	<div class="col-lg-4 mb-2">
					 		<div class="card" style="width: 18rem;" data-aos="zoom-in">
							  <div class="card-body">
							    <h5 class="card-title">Commande du <?php echo $afficher['jour'].'/'.$afficher['mois'].'/'.$afficher['annee']; ?></h5>
							    <p class="card-text"><?php echo $afficher['description']; ?></p>
							    <?php 
							    	if ($afficher['statu'] == 0) {
							    		?>
							    		<button class='btn btn-warning disabled'>en cours...</button>
							    		<a href='traitement/supr-commande.php?id=<?php echo $afficher['id_commande'] ?>' class='btn btn-danger '>annuler</a>
							    	<?php  }elseif ($afficher['statu'] == 1) {
							    		?>
							    		<button class='btn btn-success disabled'>commande effectué</button>
							    	<?php  }
							    	else{
							    		?>
							    
							    		<a href='<?php  ?>' class='btn btn-danger disabled'>commande annuler</a>
							    	<?php }
							     ?>
							    
							    
							    
							   
							  </div>
							</div>
					 	</div>
					 

						<?php } ?>
				</div>

				<hr class="mt-5 mb-5 bg-danger btn-primary" style="height: 2px;">

				<div class="row">
					<div class="offset-md-4 col-md-3 ">
						
						<?php 
							$D = $bdd->prepare("SELECT COUNT(id_devis) AS nbDevis FROM devis WHERE email = ?;");
							$D->execute(array($_SESSION['email_client']));
 							$repD = $D->fetch();
						 ?>
						<i class="bold text-center size-2"><?php echo $repD['nbDevis']; ?></i>
						<button class="btn btn-lg btn-info module" > Mes Devis</button>

					</div>
				</div>

				<div class="row mt-5	" id="mesdevis" >
				<?php
				

				$devis = $bdd->prepare("SELECT *, YEAR(dateDevis) AS annee, MONTH(dateDevis) AS mois, DAY(dateDevis) AS jour FROM devis WHERE email = ? LIMIT 0,3");
				$devis->execute(array($_SESSION['email_client']));

				while ($affich = $devis->fetch()) {
				 ?>

				
				 	<div class="col-lg-4 mb-2" >
				 		<div class="card" style="width: 18rem;" data-aos="zoom-out-up">
						  <div class="card-body">
						    <h5 class="card-title">Devis du <?php echo $affich['jour'].'/'.$affich['mois'].'/'.$affich['annee']; ?></h5>
						    <p class="card-text"><?php echo $affich['description']; ?></p>
						    <?php 
							    	if ($affich['statu'] == 0) {
							    		?>
							    		<a href="valider-devis.php?id_devis=<?php echo $affich['id_devis']; ?>"	class="btn btn-sm btn-warning disabled"><i class="fa fa-"></i>en cours...</a>
							    		<a href="anul-devis.php?id_devis=<?php echo $affich['id_devis']; ?>"	class="btn btn-sm btn-danger" title="annuler le devis"><i class="fa fa-"></i>annuler</a>
							    	<?php  }elseif ($affich['statu'] == 1) {
							    		?>
							    		<button class='btn btn-success disabled'>devis effectué</button>
							    	<?php  }
							    	else{
							    		?>
							    
							    		<button class='btn btn-danger disabled'>devis annuler</button>
							    	<?php }
							     ?>
						  </div>
						</div>
				 	</div>
				 

					<?php 
						} 
						// $devis->closecursor(); 
					?>
				</div>

			</div>
		</div>


	</div>

	
	<?php include 'footer.php'; ?>
</body>
</html>

<?php 
}else{
	header("location: connexion-client.php");
	}
 ?>
