<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="page-acceuil">

	<?php include 'header.php'; ?>

	<div class="container client">
		<div class="row">
			<div class="col-lg-8 offset-lg-4 index">
				
				<div class="row">
					<div class="col-12 box-devis mb-5	">
						<h1 class="title-devis bold text-center">Inscription</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12 mb-2">
						<div class="text-devis">
							<p class="bold">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<p class="bold text-center text-success size-3"> <?php echo $_SESSION['inscritSuccess']; ?></p>
						<form action="traitement/trait-inscription.php" method="post">
							<div class="row">
								<div class="col-md-6">
									<label for="nom">Nom</label>
									<input type="text" name="nom" id="nom" class="form-control">
									<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['nom'];} ?></i></p>
								</div>

							
									<div class="col-md-6">
										<label for="prenom">Prenom</label>
										<input type="text" name="prenom" id="prenom" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['prenom'];} ?></i></p>
									</div>
								

								
									<div class="col-md-8">
										<label for="email">email</label>
										<input type="text" name="email" id="email" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['email'];} ?></i></p>
									</div>
								

								
									<div class="col-md-4">
										<label for="tel">tel</label>
										<input type="text" name="tel" id="tel" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['tel'];} ?></i></p>
									</div>
							

									<div class="col-md-6">
										<label for="compagnie">compagnie</label>
										<input type="text" name="compagnie" id="compagnie" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['compagnie'];} ?></i></p>
									</div>
								

								
									<div class="col-md-6">
										<label for="addresse">addresse</label>
										<input type="text" name="addresse" id="addresse" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['addresse'];} ?></i></p>
									</div>
								
									<div class="col-md-6">
										<label for="password">Password</label>
										<input type="password" name="pwd" id="password" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['pwd'];} ?></i></p>
									</div>

									<div class="col-md-6">
										<label for="confpassword">Confirmer Password</label>
										<input type="password" name="confpwd" id="confpassword" class="form-control">
										<p class="text-danger size-1 bold"><i><?php if($_SESSION['isEr']){ echo $_SESSION['confpwd'];} ?></i></p>
									</div>

									<div class="col-md-12">
										<input type="submit" value="s'inscrire" class="btn btn1 btn-lg btn-block mb-2">
									</div>

									<div class="col-12">
										<p class="size-1"><i>vous avez déjà un compte ? cliquez <a href="connexion-client.php" class="bold text-warning size-2"> ICI</a></i></p>
									</div>
								
							</div>
							</form>
					</div>
				</div>

			</div>
		</div>




	</div>


	


</body>
</html>