<?php 
session_start(); 

require '../traitement/database.php';


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
<body class="page-admin">

	<div class="container index client">

		<div class="row">
			<div class="col-lg-4 offset-lg-4 mb-5 mt-2">
				<a href="index.php" class="bold mr-3" title="retour au tableau de bord"><i class="fa fa-dashboard size-3 "></i></a>
				<a href="../traitement/deconnexion.php" class="bold mr-3" title="deconnexion"><i class="fa fa-sign-out size-3 text-danger"></i></a>
				<a href="../index.php"><i><span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span></i></a>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-5 offset-lg-2 mb-5">
				<?php 
					if ($_GET) {
						
						$id = $_GET['id_four'];

						$select = $bdd->prepare("SELECT *, YEAR(dateAjout) AS annee, MONTH(dateAjout) AS mois, DAY(dateAjout) AS jour FROM fournisseurs WHERE id_fournisseur = ?");
						$select->execute(array($id));
						$query = $select->fetch();
					}

				 ?>

				 <div class="card" style="width: 18rem;" >
				  <div class="card-body">
				    
				    <p class="bold size-3 "><?php echo $query['username']; ?></p>
					 <p><i class="fa fa-home size-2"></i> <span class="bold size-2"><?php echo $query['nom']; ?></span></p>
					 <p><i class="fa fa-map-marker size-2"></i> <span class="bold size-2"><?php echo $query['adresse']; ?></span></p>
					 <p><span class="bold size-2"><i class="fa fa-phone size-2"></i>  <?php echo $query['contact']; ?></span><br><span class="bold size-2"><i class="fa fa-envelope size-2"></i>  <?php echo $query['email']; ?></span> </p>
					 <p class="size-1">sur <span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span> depuis <span><?php echo $query['jour'].'/'.$query['mois'].'/'.$query['annee']; ?></span> </p>
				    
				  </div>
				</div>
				 

			</div>

			<div class="col-md-5 ">
				
				<div class="card text-white bg-info mb-3" style="max-width: 18rem;" >
					<div class="card-header"><i class="fa fa-home size-2"></i>  <?php echo $query['nom']; ?></div>
					<div class="card-body">
					    <h5 class="card-title"><i class="fa fa-map-marker size-2"></i>  <?php echo $query['adresse']; ?></h5>
					    <p class="card-text"<?php echo $query['description']; ?></p>
					    <a href="" class="btn btn-sm btn-secondary disabled">Profil</a>
					</div>
				</div>

				



			</div>
		</div>
	</div>

	
	

	


</body>
</html>