<?php include './assets/inc/application_include.php'; ?>
<html>
<head>
	<title>Accueil</title>
	<!-- Les includes communs -->
	<?php include $MyHomePath.'assets/inc/head.php'; ?>
	<!-- Les includes de groupes pour la page -->
	<script src="./assets/js/connexion.js"></script>
	<?php include $MyHomePath.'assets/inc/include_compte.php'; ?>
</head>
<body>
	<!--La navbar-->
	<?php include $MyHomePath.'assets/inc/navbar.php'; ?>
	<!-- Le body -->
	<div class="container">
		<div class="py-5 text-center">
			<!-- Barre de titre ou juste séparation entre navbar et content -->
		</div>
		<div class="row">
			<div class="py-2 col-md-12">
				<section class="jumbotron text-center">
					<div class="container">
						<h1 class="jumbotron-heading">What to do today ?</h1>
						<p class="lead text-muted">
							Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.
						</p>
						<p>
							<a href="#" class="btn btn-primary my-2">Creer un compte ?</a>
							<a href="#" class="btn btn-secondary my-2">Commander un produit ?</a>
						</p>
					</div>
				</section>
				<div class="album py-3 bg-light">
					<div class="container">
						<div class="row">
							<!-- #NoExam Ca c'est une card ! -->
							<div class="py-2 col-md-6">
								<div class="card mb-6 box-shadow">
									<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="https://i.ytimg.com/vi/rjq-AXG-pd4/hqdefault.jpg" data-holder-rendered="true">
									<div class="card-body">
										<p class="card-text">Make you'r infos.</p>
										<div class="d-flex justify-content-between align-items-center">
											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
												<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
											</div>
											<small class="text-muted">9 mins</small>
										</div>
									</div>
								</div>
							</div>
							<!-- #NoExam jusque la puis on copy/paste -->
							<div class="py-2 col-md-6">
								<div class="card mb-6 box-shadow">
									<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-0/c48.0.792.792a/s526x395/1900020_1403274403263434_22652284_n.jpg?_nc_cat=100&_nc_ohc=iqGUAKE48AwAQmH0Qu4dlfGCTtabBY-t9l6i2YOjFxJi9OSOCIBlulWBA&_nc_ht=scontent-cdt1-1.xx&oh=fe4344e2187046bca06c77ed1e8a94b3&oe=5E8B0758" data-holder-rendered="true">
									<div class="card-body">
										<p class="card-text">Make you'r infos.</p>
										<div class="d-flex justify-content-between align-items-center">
											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
												<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
											</div>
											<small class="text-muted">Une petite infos genre du temps :-}</small>
										</div>
									</div>
								</div>
							</div>
							<!-- #NoExam et on recommence mais on change les md-6 et mb-6 en 12-->
							<div class="py-2 col-md-12">
								<div class="card mb-12 box-shadow">
									<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="https://i.ytimg.com/vi/CYykK-nqSnM/maxresdefault.jpg" data-holder-rendered="true">
									<div class="card-body">
										<p class="card-text">Make you'r infos.</p>
										<div class="d-flex justify-content-between align-items-center">
											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
												<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
											</div>
											<small class="text-muted">Une petite infos genre du temps :-}</small>
										</div>
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