<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="js/aos-master/dist/aos.css">

</head>
<body >
	<div class="container-fluid bg-light">
		<nav class="navbar sticky-top navbar-expand-lg navbar-light ">

			<a class="navbar-brand text-center" href="index.php"><span class="logo"><span class="big">B<span class="lei">!</span>G</span><span class="leh">HOUSE</span></span></a>
		 
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Acceuil<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link"  href="devis.php">Devis</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="fournisseur.php">Fournisseur</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="client.php">Espace Client</a>
		      </li>

		    </ul>
		  </div>
		  <div>
		  	<ul class="nav">
		  		<li class="nav-item">
		       <?php if($_SESSION['id_client']){ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='client.php'>".$_SESSION['nom_client']."</a> "; }elseif($_SESSION['id_fournisseur']){ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='client.php'>".$_SESSION['username']."</a> ";}elseif($_SESSION['id_admin']){ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='client.php'>".$_SESSION['admin']."</a> ";}else{ echo " <a class='nav-link btn btn-sm btn-outline-success mr-1' href='connexion-client.php'>CONNEXION</a>"; } ?> 
		      </li>
		       <li class="nav-item">
		       	<?php if($_SESSION['id_client']){ echo " <a class='nav-link btn btn-sm btn-danger' href='traitement/deconnexion.php' title='deconnexion'><i class='fa fa-sign-out size-2'></i></a>"; }else{ echo " <a class='nav-link btn btn-sm btn-primary' href='inscription.php'>INSCRIPTION</a>"; } ?> 
		        
		      </li>
		  	</ul>
		  </div>
		   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		</nav>
	</div>
</body>
</html>