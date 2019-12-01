<?php include './assets/inc/application_include.php'; ?>
<html>
<head>
	<title>Accueil</title>
	<!-- Les includes communs -->
	<?php include $MyHomePath.'assets/inc/head.php'; ?>
	<!-- Les includes de groupes pour la page -->
	<script src="./assets/js/connexion.js"></script>
	<?php include $MyHomePath.'assets/inc/include_compte.php'; ?>
	<?php include $MyHomePath.'assets/inc/include_produit.php'; ?>
</head>
<body>
	<!--La navbar-->
	<?php include $MyHomePath.'assets/inc/navbar.php'; ?>
	<!-- Le body -->
	<div class="container">
		<div class="py-5 text-center">
			<!-- Barre de titre ou juste séparation entre navbar et content -->
			<h2>Stock</h2>
		</div>
		<div class="row">
			<div class="py-2 col-md-12">
				<div class="album py-3 bg-light">
					<div class="container">
						<div class="row">
							<!-- #NoExam Les produit en objets -->
							<?php
							$AllProducts = Produit_SelectAll();
							$AffichageStr = "";
							foreach ($AllProducts as $key => $value) {
								$AffichageStr .= 
								'<div class="py-2 col-md-4">
									<div class="card mb-4 box-shadow">
										<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 280px; width: 100%; display: block;" src="'.$value->LienImage().'">
										<div class="card-body">
											<ul class="list-group" style="max-height: 150px;margin-bottom: 10px;overflow:scroll;-webkit-overflow-scrolling: touch;overflow-x: hidden;">
												<li class="list-group-item">Libelle: '.$value->Libelle().'</li>
												<li class="list-group-item">Categorie: '.$value->Categorie().'</li>
												<li class="list-group-item">Marque: '.$value->Marque().'</li>
												<li class="list-group-item">PrixUnitaire: '.$value->PrixUnitaire().'</li>
												<li class="list-group-item">Tva: '.$value->Tva().'</li>
												<li class="list-group-item">'.$value->Description().'</li>
											</ul>
											<div class="d-flex justify-content-between align-items-center">
												<div class="btn-group">
													<form action="./produit_edit.php" method="POST">
														<button type="submit" class="btn btn-sm btn-outline-secondary" name="idProduit" value="'.$value->IdProduit().'">Edit</button>
													</form>
													<form action="./bidon.php" method="POST">
														<button type="submit" class="btn btn-sm btn-outline-primary" name="idProduit" value="'.$value->IdProduit().'">Buy</button>
													</form>
												</div>
												<small class="text-muted">Ref: '.$value->Reference().'</small>
												<small class="text-muted">Qt: '.$value->Quantite().'</small>
											</div>
										</div>
									</div>
								</div>';
							}
							print_r($AffichageStr);
							?>
							<div class="py-2 col-md-4">
								<div class="card mb-4 box-shadow">
									<a href="#">
										<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 280px; width: 100%; display: block;" src="https://content.fortune.com/wp-content/uploads/2019/04/brb05.19.plus_.jpg">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-center">
												<small class="text-muted">Add a Product</small>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include $MyHomePath.'assets/inc/footer.php'; ?>
</body>
</html>