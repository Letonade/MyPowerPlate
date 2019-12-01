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
			<h2>Produit</h2>
		</div>
		<div class="row">
			<div class="py-2 col-md-12">
				<div class="album py-3 bg-light">
					<div class="container">
						<div class="row">
							<div class="py-2 col-md-12 login-sec">
								
								<!-- #NoExam Les produit en objets -->
								<?php
									$MyProduct = new Produit;
									$MyProduct->IdProduit($_POST['idProduit']);
									$MyProduct = Produit_SelectOne($MyProduct);
									$MyProduct->ProductForm();
								?>
								<form>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input type="text" class="form-control" id="" placeholder="">
										<small id="" class="form-text text-muted">Details. flemme...</small>
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
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