<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="js/aos-master/dist/aos.css">
</head>
<body class="page-acceuil">

	<div class="container ">
		<div class="row ">
			<div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 index connexion-client">
				<h2 class="bold text-center mt-1">connexion</h2>
				<p><?php if($_SESSION['clientSuccess']){echo $_SESSION['conect_cl'];}?></p>
				<form action="traitement/trait-connexion-client.php" method="post">
					<div class="row">
						<div class="col-12">
							<label for="email" class="mb-0 "><i class="fa fa-user"></i></label>
							<input type="text" name="email" id="email" class="form-control mt-0" placeholder="Votre email">
						</div>

						<div class="col-12 mt-3">
							<label for="password" class="mb-0 "><i class="fa fa-key"></i></label>
							<input type="password" name="pwd" id="password" class="form-control mt-0" placeholder="Votre mot de passe">

							<input type="submit" value="connexion" class="btn btn1 btn-lg btn-block mb-2 mt-3">
						</div>

						<div class="col-12">
							<p class="size-1"><i>vous n'avez pas de compte ? cliquez <a href="inscription.php" class="bold text-warning size-2"> ICI</a></i></p>
						</div>
					</div>
			</div>
		</div>
	</div>

	
	

	

	
</form>
</body>
</html>