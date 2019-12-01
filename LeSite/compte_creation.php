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
	<!-- navbar -->
	<?php include $MyHomePath.'assets/inc/navbar.php'; ?>
	<div class="container">
		<div class="py-5 text-center">
			<!-- Barre de titre ou juste séparation entre navbar et content -->
			<h2>Création de compte</h2>
		</div>
		<div class="row">
			<div class="py-2 col-md-12 login-sec">
				<form id="formulaire" class="login-form" action="" method="post" onkeyup='if (event.keyCode === 13) {document.getElementById("formulaire_validate").click();}'>
					<label for="userProfil" >Profil</label>
					<div class="form-group">
						<select class="form-control"  name="userProfil" id="userProfil"> 
							<option value ="Manager">Manager</option>
							<option value ="Client"> Client</option>
						</select>
					</div>
					<div class="form-group">
						<label for="userLogin" >Login</label>
						<input name="userLogin" id="userLogin" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="userPassword" >Password</label>
						<input name="userPassword" id="userPassword" type="userPassword" class="form-control">
					</div>
					<button id="formulaire_validate" type="button" class="btn btn-primary btn-lg btn-block" onclick="fct_creer_compte('creer')">Sign In</button>
				</form>
			</div>
		</div>
	</div>
	<?php include $MyHomePath.'assets/inc/footer.php'; ?>
</body>
</html>