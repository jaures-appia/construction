<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-image: url(images/devis-background.jpg);
			background-size: cover;
			height: 100%;
			width: 100%;
		}
	</style>
</head>
<body>

	<?php include 'header.php'; ?>

	<div class="container mt-5 mb-5">
		
		<div class="row">
			<div class="col-sm-8 offset-sm-4 index">
				
				<div class="row">
					<div class="col-12 box-devis mb-5	">
						<h1 class="title-devis bold text-center">DEVIS</h1>
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
					<div class="col-md-12">
						<p class="text-success text-center bold mb-5" style="font-size: 22px"><?php  ?></p>
						<form action="traitement/trait-devis.php" method="post">
							<div class="row">
								<div class="col-sm-6">
									<label for="" class="label">Nom</label>
									<input type="text" name="nom" class="form-control" id="nom">
									<p class="text-danger" style="font-size: 15px; font-weight: bold;"><i><?php if($_SESSION['isEr']){ echo $_SESSION['nomEr'];} ?></i></p>
								</div>

								<div class="col-sm-6">
									<label for="prenom" class="label">Prenom</label>
									<input type="text" name="prenom" class="form-control" id="prenom">
									<p class="text-danger" style="font-size: 15px; font-weight: bold;"><i><?php if($_SESSION['isEr']){echo $_SESSION['prenomEr'];} ?></i></p>
								</div>

								<div class="col-sm-8">
									<label for="email" class="label">Email</label>
									<input type="text" name="email" class="form-control" id="emil">
									<p class="text-danger" style="font-size: 15px; font-weight: bold;"><i><?php if($_SESSION['isEr']){echo $_SESSION['emailEr'];} ?></i></p>
								</div>

								<div class="col-sm-4">
									<label for="tel" class="label">Telephone</label>
									<input type="text" name="tel" class="form-control" id="tel">
									<p class="text-danger" style="font-size: 15px; font-weight: bold;"><i><?php if($_SESSION['isEr']){echo $_SESSION['telEr'];} ?></i></p>
								</div>

								<div class="col-sm-12 mb-5	" >
									<label for="description" class="label">Description de l'edifice</label>
									<textarea class="form-control" id="description" name="description"></textarea>
									<p class="text-danger" style="font-size: 15px; font-weight: bold;"><i><?php if($_SESSION['isEr']){echo $_SESSION['descriptionEr'];} ?></i></p>

									<input type="submit" value="ENVOYER" class="btn btn1 btn-lg btn-block">
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