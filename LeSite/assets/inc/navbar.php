<div class="navbar navbar-expand-md navbar-dark bg-dark box-shadow">
	<div class="container d-flex justify-content-between">
		<a href="./home.php" class="navbar-brand d-flex align-items-center">
			<!-- #NoExam J'espère que vous avez choisi un nom d'app, le substr réduit juste le nom pour avoir MY_APP, il est à supprimer. -->
			<strong><?=substr(MY_APP_NAME,0,6)?></strong>
		</a>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<?php 
				// #NoExam On mets les pages dans le tableau et hop ! c'est fini !
				$MyPagesLeft = [
								["home.php","Home"]
								,["compte_creation.php","Create Account"]
								,["produit_liste.php","Stock"]
								//,["test.php","test"]
							];
				$MyPagesRight = [
								["Bidon.php","MyCommands"]
								,["Bidon.php","MyAccount"]
								//,["test.php","test"]
				];
				// #NoExam La partie gauche
				$MyNavsHTML = "<ul class='navbar-nav mr-auto'>";
				$whoami = basename(debug_backtrace()[sizeof(debug_backtrace())-1]['file']);
				foreach ($MyPagesLeft as $key => $value) {
					$MyNavsHTML .= '<li class="nav-item '.($whoami == $value[0] ?"active" :"").'">
										<a class="nav-link" href="./'.$value[0].'">'.$value[1].'</a>
									</li>';
				}
				// #NoExam La partie droite
				$MyNavsHTML .= "</ul><ul class='navbar-nav'>";
				$whoami = basename(debug_backtrace()[sizeof(debug_backtrace())-1]['file']);
				foreach ($MyPagesRight as $key => $value) {
					$MyNavsHTML .= '<li class="nav-item '.($whoami == $value[0] ?"active" :"").'">
										<a class="nav-link" href="./'.$value[0].'">'.$value[1].'</a>
									</li>';
				}
				print_r($MyNavsHTML."</ul>");
			?>
		</div>
	</div>
</div>