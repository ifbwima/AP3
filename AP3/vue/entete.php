<html>
	<head>
		<!-- Base -->
		<meta charset='UTF-8'>
    	<meta name='viewport' content='width=device-width, initial-scale=1'>
    	<title>GSB-visites</title>


    	<!-- Adding Bootstrap -->
    	<link href='./css/bootstrap.min.css' rel='stylesheet'>
    	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css'>
    	<script src="https://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	</head>
	<body class="bg-white">
		<div>
	
		<nav class="navbar navbar-expand-lg navbar-secondary bg-light">
			<div class="container-fluid">

				<img src="./image/gsb.png" width="100"/>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<center>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						
                        <?php if(isLoggedOn()){ ?>
							<li class="nav-item">
								<a class="nav-link <?= $_GET['action'] = 'defaut' ? 'active' : '' ?>" aria-current="page" href="./?action=defaut">Accueil</a>
							</li>

							<li class="nav-item">
								<a class="nav-link <?= $_GET['action'] = 'rapport' ? 'active' : '' ?>" aria-current="page" href="./?action=rapport">Rapport</a>
							</li>

							<li class="nav-item">
								<a class="nav-link <?= $_GET['action'] = 'medecin' ? 'active' : '' ?>" aria-current="page" href="./?action=medecin">Medecin</a>
							</li>

							<li class="nav-item"  data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                                <a class="nav-link">Profil</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link <?= $_GET['action'] = 'deconnexion' ? 'active' : '' ?>" aria-current="page" href="./?action=deconnexion">Deconnexion</a>
							</li>
                        <?php }?>
					</ul>
				</div>
				</center>
			</div>
		</nav>

		<!-- Profil Modal 1-->
        <div class="modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-body">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<div class="card" style="width: 18rem;">
									<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
										<img src="image/profil.jpg" class="card-img-top" alt="...">
										<div class="card-body">
											<?php print("<h4 class=\"card-title\">".$_SESSION["prenom"]."</h4>".
											"<h5 class=\"card-title\">".$_SESSION["nom"]."</h5>".
											"<p>".$_SESSION["adresse"]."</p>".
											"<p>Date Embauche: ".$_SESSION["date"]."</p>"
											);?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>