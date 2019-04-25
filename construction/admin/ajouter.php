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
			<div class="col-md-8 offset-lg-2 mb-5">

				<p class="text-center bold text-success"><?php echo $_SESSION['success']; ?></p>

				 <form action="trait-ajouter.php" method="post">
							<div class="row">
								<div class="col-sm-6 mb-4">
									<label for="nom" class="label-ajout"><span class="text-danger">*</span>Nom de la sodiété</label>
									<input type="text" name="nom" class="form-control" id="nom" >
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erNom'];} ?></small>
								</div>
								<div class="col-sm-6 mb-4">
									<label for="username" class="label-ajout"><span class="text-danger">*</span>Nom d'utilisateur</label>
									<input type="text" name="username" class="form-control" id="username" >
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erPrenom'];} ?></small>
								</div>
								<div class="col-sm-6 mb-4">
									<label for="pwd" class="label-ajout"><span class="text-danger">*</span>Mot de passe</label>
									<input type="password" name="pwd" class="form-control" id="pwd " >
									<small class="text-danger"><?php if($_SESSION['isEr']){echo $_SESSION['erTel'];} ?></small>
								</div>
								<div class="col-sm-6 mb-4">
									<label for="confpwd" class="label-ajout"><span class="text-danger">*</span>Confirmer mot de passe</label>
									<input type="password" name="confpwd" class="form-control" id="confpwd" >
									<small class="text-danger bold"><?php echo $_SESSION['er']; ?></small>
								</div>
								
								<div class="col-sm-4">
									<input type="submit" value="Ajouter" class="btn btn1 btn-lg btn-block">
								</div>
								
							</div>
						</form>
			</div>
		</div>








	</div>

</body>
</html>
