<?php 
session_start(); 

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

	<div class="container index client">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 mb-5">
				<a href="profil-fournisseur.php" class="bold mr-3"><i>annuler</i></a>
				<a href="../traitement/deconnexion.php" class="bold mr-3"><i>deconnexion</i></a>
				<a href="../index.php"><i><span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span></i></a>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-8 offset-lg-2 mb-5">
				<?php 
					$select = $bdd->prepare("SELECT * FROM fournisseurs WHERE id_fournisseur = ?");
					$select->execute(array($_SESSION['id_fournisseur']));
					$query = $select->fetch();

				 ?>

				 <form action="trait-modifier.php" method="post">
							<div class="row">
								<div class="col-sm-6 mb-4">
									<label for="nom" class="label-ajout"><span class="text-danger">*</span>Nom de la sodiété</label>
									<input type="text" name="nom" class="form-control" id="nom" value="<?php echo $query['nom']; ?>">
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erNom'];} ?></small>
								</div>
								<div class="col-sm-6 mb-4">
									<label for="username" class="label-ajout"><span class="text-danger">*</span>Nom d'utilisateur</label>
									<input type="text" name="username" class="form-control" id="username" value="<?php echo $query['username']; ?>">
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erPrenom'];} ?></small>
								</div>
								<div class="col-sm-4 mb-4">
									<label for="contact" class="label-ajout"><span class="text-danger">*</span>Contact</label>
									<input type="text" name="contact" class="form-control" id="contact " value="<?php echo $query['contact']; ?>">
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erTel'];} ?></small>
								</div>
								<div class="col-sm-8 mb-4">
									<label for="email" class="label-ajout"><span class="text-danger">*</span>Email</label>
									<input type="text" name="email" class="form-control" id="email" value="<?php echo $query['email']; ?>">
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erHabita'];} ?></small>
								</div>
								<div class="col-sm-12 mb-4">
									<label for="adresse" class="label-ajout">Adresse</label>
									<input type="text" name="adresse" class="form-control" id="adresse" value="<?php echo $query['adresse']; ?>">
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erProf'];} ?></small>
								</div>
								
								<div class="col-sm-12 mb-4">
									<label for="description" class="label-ajout">Description</label>
									<textarea name="description" class="form-control" id="description " value="<?php echo $query['description']; ?>"></textarea> 
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erFonct'];} ?></small>
								</div>

								<div class="col-sm-12 mb-4">
									<label for="actualite" class="label-ajout">actualité</label>
									<textarea name="actualite" class="form-control" id="actualite " value="<?php echo $query['description']; ?>"></textarea> 
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erFonct'];} ?></small>
								</div>

								<div class="col-sm-6 mb-4">
									<label for="pwd" class="label-ajout">mot de passe</label>
									<input type="password" name="pwd" class="form-control" id="pwd" value="<?php echo $query['password']; ?>">
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erFonct'];} ?></small>
									<input type="text" name="id_fournisseur" value="<?php echo $query['id_fournisseur']; ?>" hidden>
									<input type="submit" value="Modifier" class="btn btn1 btn-lg btn-block mt-3">
								</div>

								<div class="col-sm-4 mb-3" >
									
								</div>
								
								
							</div>
						</form>
			</div>
		</div>








	</div>

</body>
</html>
<?php }else{
	header("location: ../index.php");
} ?>