<?php 
session_start(); 

require '../traitement/database.php';

if ($_SESSION['id_admin']) {
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

	<div class="container-fluid index client">

		<div class="row">
			<div class="col-lg-4 offset-lg-4 mb-5 mt-2">
				<a href="ajouter.php" class="bold mr-3" title="ajouter un fournisseur"><i class="fa fa-plus size-3 text-primary"></i></a>
				<a href="index.php" class="bold mr-3" title="retour au tableau de bord"><i class="fa fa-dashboard size-3 "></i></a>
				<a href="../traitement/deconnexion.php" class="bold mr-3" title="deconnexion"><i class="fa fa-sign-out size-3 text-danger"></i></a>
				<a href="../index.php"><i><span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span></i></a>
			</div>
		</div>
		
		<div class="row ">
			<div class="col-md-5 mb-5 mb-5">

				<h3 class="bold text-center">FOURNISSEURS</h3>

				<table class="table-danger table-bordered ">
					<thead>
						<tr>
						
							<th>#</th>
							<th>Username</th>
							<th>Société</th>
							<th>Addresse</th>
							<th>Contact</th>
							<th>Action</th>
						</tr>
					</thead>

					<?php 
						$select = $bdd->query("SELECT *, YEAR(dateAjout) AS annee, MONTH(dateAjout) AS mois, DAY(dateAjout) AS jour FROM fournisseurs ");

						while ($query = $select->fetch()) {
					 ?>

					<tbody>
						<tr>
							<td></td>
							<td><?php echo $query['username'] ?></td>
							<td><?php echo $query['nom'] ?></td>
							<td><?php echo $query['adresse'] ?></td>
							<td><?php echo $query['contact'] ?></td>
							<td><a href="voir-four.php?id_four=<?php echo $query['id_fournisseur']; ?>"	class="btn btn-sm btn-secondary mb-1"><i class="fa fa-eye"></i> voir</a>
								<a href="modifier.php?id_four=<?php echo $query['id_fournisseur']; ?>"	class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> modifier</a>
								<a href="supr-fournisseur.php?id_four=<?php echo $query['id_fournisseur']; ?>"	class="btn btn-sm btn-danger" title="supprimer le fournisseur"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					</tbody>
					<?php }  ?>
				</table>

				

				 
				 

			</div>

			<div class="col-md-7 mb-5">
				
				
				<h3 class="bold text-center">DEVIS</h3>

				<table class="table-danger table-bordered">
					<thead>
						<tr>
						
							<th>#</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Contact</th>
							<th>Email</th>
							<th>description</th>
							<th>Action</th>
						</tr>
					</thead>

					<?php 
						$recup = $bdd->query("SELECT *, YEAR(dateDevis) AS annee, MONTH(dateDevis) AS mois, DAY(dateDevis) AS jour FROM devis ORDER BY id_devis DESC ");

						while ($devis = $recup->fetch()) {
					 ?>

					<tbody>
						<tr>
							<td></td>
							<td><?php echo $devis['nom'] ?></td>
							<td><?php echo $devis['prenom'] ?></td>
							<td><?php echo $devis['telephone'] ?></td>
							<td><?php echo $devis['email'] ?></td>
							<td><?php echo $devis['description'] ?></td>
							<td> <?php 
							    	if ($devis['statu'] == 0) {
							    		?>
							    		<a href="valider-devis.php?id_devis=<?php echo $devis['id_devis']; ?>"	class="btn btn-sm btn-success"><i class="fa fa-"></i> effectué</a>
							    		<a href="anul-devis.php?id_devis=<?php echo $devis['id_devis']; ?>"	class="btn btn-sm btn-danger" title="annuler le devis"><i class="fa fa-warning"></i></a>
							    	<?php  }elseif ($devis['statu'] == 1) {
							    		?>
							    		<button class='btn btn-success disabled'>devis effectué</button>
							    	<?php  }
							    	else{
							    		?>
							    
							    		<button class='btn btn-danger disabled'>devis annuler</button>
							    	<?php }
							     ?>
							</td>
						</tr>
					</tbody>
					<?php } ?>
				</table>


			</div>
		</div>
	</div>

	
	

	


</body>
</html>
<?php }else{
	header("location: connexion-admin.php");
} ?>
