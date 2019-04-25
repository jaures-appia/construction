<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>B!G House</title>
</head>
<body class="page-acceuil">
	<?php include 'header.php'; ?>

	<div class="container index mt-5 mb-5">
		<div class="row mb-2">
			<div class="col-12 mot-acceuil text-center">
				<marquee>
					<h2 class="mt-4 mb-4 defile">Bienvenue chez <span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span>, la plateforme qui réunit tous les fournisseurs de matériaux de construction de la cote d'ivoire</h2>
				</marquee>
			</div>
		</div>

		<div class="row mt-5 mb-5">
			<div class="col-sm-6 mb-2">
				
				<div class="card carte " style="width: 70%;" data-aos="zoom-out-right">
				  <img class="card-img-top " src="images/devis.jpg" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">DEVIS</h5>
				    <p class="card-text mt-1">
				    	Sur BIG HOUSE, pour toute vos construction, faite vos dévis en ligne rapidement.
				    </p>
				    <a href="devis.php" class="btn btn-primary mt-1 mb-2">Savoir plus</a>
				  </div>
				</div>

			</div>

			<div class="col-sm-6 ">

				<div class="card carte" style="width: 70%;" data-aos="zoom-out-right">
				  <img class="card-img-top " src="images/fournisseur.jpg" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">FOURNISSEURS</h5>
				    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				    <a href="fournisseur.php" class="btn btn-primary">Savoir plus</a>
				  </div>
				</div>

			</div>
		</div>

		<div class="row mt-5 mb-5 apropos">
			<div class="col-md-3 col-lg-2 mt-5 box1 " data-aos="fade-up">
				<p class="mot-droite">Des Experts à votre disposition</p>
			</div>

			<div class="col-md-6 col-lg-8 box2 mt-5">
				<span class="bold text-warning mr-2">FOURNISSEUR 1</span>
				<span class="bold text-primary mr-2">FOURNISSEUR 2</span>
				<span class="bold text-success mr-2">FOURNISSEUR 3</span>
				<span class="bold text-danger mr-2">FOURNISSEUR 4</span>
			</div>

			<div class="col-md-3 col-lg-2 mt-5 box1" data-aos="fade-up">
				<p class="mot-gauche">Les Fournisseurs sérieux du pays</p>
			</div>
		</div>

		<div class="row mb-5 contact-acceuil">
			<div class="col-12 mt-2 mb-5">
				<h4 class="text-center title-contact mb-4">Contact 
				<div class="bordure mt-1"></div></h4>
				<form>
				<div class="row ">
					
					<div class="col-sm-4 mt-2">
						<input type="text" name="nom" placeholder="Votre nom" class="form-control">
					</div>
					<div class="col-sm-4 mt-2">
						<input type="text" name="email" placeholder="Votre email" class="form-control">
					</div>
					<div class="col-sm-4">
						<textarea name="message" placeholder="Votre message" class="form-control mt-2">
						</textarea>

					</div>
				
				</div>
				<div class="row">
					<div class="col-12 text-center mt-2 mb-2">
						<input type="submit" name="envoyer" class="btn btn1 btn-lg btn-block btn-info">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	



	<?php include 'footer.php'; ?>
</body>
</html>