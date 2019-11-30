<?php include './assets/inc/application_include.php'; ?>
<html>        
    <head>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'assets/inc/head.php'; ?>
        <!-- Les includes de groupes pour la page -->
        <script src="./assets/js/connexion.js"></script>
        <?php include $MyHomePath.'assets/inc/include_vue.php'; ?>
    </head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 login-sec">
					<h2 class="text-center"><?=MY_APP_NAME?></h2>
					<form id="formulaire" class="login-form" action="" method="post" onkeyup='if (event.keyCode === 13) {document.getElementById("formulaire_validate").click();}'>
						<div class="form-group">
							<label for="sessionId" >Session</label>
							<input name="sessionId" id="sessionId" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" >Password</label>
							<input name="password" id="password" type="password" class="form-control">
						</div>
						<div class="form-check">
							<button id="formulaire_validate" type="button" class="btn btn-login float-right" onclick="fct_verifier_connexion('verification')">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>