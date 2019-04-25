<?php session_start(); 

require 'traitement/database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="page-acceuil">
	<?php include 'header.php'; ?>

	<div class="container index client">
		<div class="row mb-5 box-fournisseur">
			<div class="col-12">
				<h1 class="title-fournisseur bold text-center">Les Fournisseurs</h1>
			</div>
		</div>

		<div class="row ">

			<?php 

			$select = $bdd->query("SELECT * FROM fournisseurs");

			while ($affich = $select->fetch()) {

			 ?>

			<div class="col-md-4 mt-3 mb-5">
				<div class="card text-white bg-info mb-3" style="max-width: 18rem;" data-aos="zoom-in">
					<div class="card-header"><i class="fa fa-home size-3"></i> <?php echo $affich['nom']; ?></div>
					<div class="card-body">
					    <h5 class="card-title"><i class="fa fa-map-marker"></i>  <?php echo $affich['adresse']; ?></h5>
					    <p class="card-text"><?php echo $affich['description']; ?></p>
					     <a href="voir-fournisseur.php?id=<?php echo $affich['id_fournisseur'] ?>" class="btn btn-sm btn-secondary">Profil</a>
					</div>
				</div>

			</div>

			<?php } ?>

			
		</div>
	</div>

	<script src="js/jquery/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/monscript.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/aos-master/dist/aos.js"></script>
	<script type="text/javascript">
		AOS.init({
			duration: 2000,
		});
	</script>
</body>
</html>