<?php 
session_start(); 
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

	<div class="container ">
		<div class="row ">
			<div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 index connexion-client">
				<h2 class="bold text-center mt-1">Fournisseur</h2>
				<p><?php if($_SESSION['isSuccess']){echo $_SESSION['conectEr'];}?></p>
				<form action="../traitement/trait-connexion.php" method="post">
					<div class="row">
						<div class="col-12">
							<label for="email" class="mb-0 "><i class="fa fa-user"></i></label>
							<input type="text" name="username" id="username" class="form-control mt-0" placeholder="Votre nom d'utlisateur">
						</div>

						<div class="col-12 mt-3">
							<label for="password" class="mb-0 "><i class="fa fa-key"></i></label>
							<input type="password" name="pwd" id="password" class="form-control mt-0" placeholder="Votre mot de passe">

							<input type="submit" value="connexion" class="btn btn1 btn-lg btn-block mb-5 mt-3">
						</div>
					</div>
			</div>
		</div>
	</div>

	
	

	

	
</form>
</body>
</html>