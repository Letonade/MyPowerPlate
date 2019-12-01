<?php include '../inc/application_include.php'?>
<?php include $MyHomePath.'assets/inc/include_compte.php'; ?>

<?php
$validate = 0;
// password_hash($TEST,PASSWORD_BCRYPT);
// password_verify("Pass", $TEST);
$ModifResponse = '';
$MonCompte = new Compte;
$MonCompte->Password($_POST["userPassword"]);
$MonCompte->Login 	($_POST["userLogin"]);
$MonCompte->Profil 	($_POST["userProfil"]);

$errorTable = new customGenericObject;
$errorTable->addParam("userProfil");$errorTable->actionPush("userProfil", 'err', ".removeClass('is-invalid')");
$errorTable->addParam("userLogin");$errorTable->actionPush("userLogin", 'err', ".removeClass('is-invalid')");
$errorTable->addParam("userPassword");$errorTable->actionPush("userPassword", 'err', ".removeClass('is-invalid')");

if ($MonCompte->Login() != NULL 
	&& $MonCompte->Login() != "" 
	&& strlen($MonCompte->Login()) >= constant("LOGIN_LENGTH_MIN")
	&& strlen($MonCompte->Login()) <= constant("LOGIN_LENGTH_MAX")) 
{
	if ($MonCompte->Password() != NULL 
		&& $MonCompte->Password() != "" 
		&& strlen($MonCompte->Password()) >= constant("VUE_MDP_LENGTH_MIN")
		&& strlen($MonCompte->Password()) <= constant("VUE_MDP_LENGTH_MAX")) 
	{
		$MonCompte = Compte_SelectOneByLoginAndPasswordAndProfil($MonCompte);
		if (is_object($MonCompte) && $MonCompte->Login() != NULL) {
			$validate = 1;
		}

		if($validate === 1) {
			$ModifResponse = '
			$("#IdCompte").remove();
			$("#formulaire").prepend("<div><input type=\'hidden\' id=\'IdCompte\' name=\'IdCompte\' value=\''.$MonCompte->IdCompte().'\'></div>");
			$("#formulaire").attr("action","./home.php");
			$("#formulaire").attr("target","");
			$("#formulaire").submit();';
		}else
		{/* Dans ce cas on ne trouve pas de vue a ces information. */
			if (Compte_FindOneByLoginAndProfil($MonCompte) == 1) {
				$errorTable->txtPush("userPassword",'err', 'Mot de passe invalide.');
				$errorTable->actionPush('userPassword', 'err', '.addClass("is-invalid")');
			}else
			{
				if ($_POST["action"] == "verification"){
				$errorTable->txtPush("userProfil",'err', 'Le profil ne correspond sans doute pas.');
				$errorTable->actionPush('userProfil', 'err', '.addClass("is-invalid")');
				$errorTable->txtPush("userPassword",'err', 'Le mot de passe est sans doute invalide.');
				$errorTable->actionPush('userPassword', 'err', '.addClass("is-invalid")');
				$errorTable->txtPush("userLogin",'err', 'Le nom de compte est sans doute invalide.');
				$errorTable->actionPush('userLogin', 'err', '.addClass("is-invalid")');

				}
				// La on affiche juste l'erreur attention à mettre soit l'erreur soit la gestion de création instantané

				/* //Ca c'est si on veut créer dans l'instant le compte
				if ($_POST["action"] == "verification"){$ModifResponse = '
					if(confirm("Aucun compte à ce nom.\nVoulez vous créer ce compte ?"))
					{fct_verifier_connexion("ajout_accord");};';}
				elseif ($_POST["action"] == "ajout_accord") {
					$MonCompte->Password(password_hash($_POST["userPassword"], PASSWORD_BCRYPT));
					$MonCompte->Login($_POST["userLogin"]);
					$MonCompte->Profil($_POST["userProfil"]);
					Compte_Insert($MonCompte);
				}
				*/
			}
		}
	}else
	{/* Ce cas correspond au manque de password */

		$errorTable->txtPush("userPassword",'err', 'Le mot de passe doit faire entre '.constant("VUE_MDP_LENGTH_MIN").' et '.constant("VUE_MDP_LENGTH_MAX").' caracteres.');
		$errorTable->actionPush('userPassword', 'err', '.addClass("is-invalid")');
	}
}else{/* Cas de session Vide */
	$errorTable->txtPush("userLogin",'err', 'Le nom de compte doit faire entre '.constant("LOGIN_LENGTH_MIN").' et '.constant("LOGIN_LENGTH_MAX").' caracteres.');
	$errorTable->actionPush('userLogin', 'err', '.addClass("is-invalid")');

	if ($MonCompte->Password() == NULL 
		|| $MonCompte->Password() == "" 
		|| strlen($MonCompte->Password()) < constant("VUE_MDP_LENGTH_MIN")
		|| strlen($MonCompte->Password()) > constant("VUE_MDP_LENGTH_MAX")) 
	{/* Ce cas correspond au manque de password */		
		$errorTable->txtPush("userPassword",'err', 'Le mot de passe doit faire entre '.constant("VUE_MDP_LENGTH_MIN").' et '.constant("VUE_MDP_LENGTH_MAX").' caracteres.');
		$errorTable->actionPush('userPassword', 'err', '.addClass("is-invalid")');
	}

}
/* Résolution */
$ModifResponse .= '$("#error-label").remove();'.$errorTable->allActionInline();
if ($errorTable->countTextLine() > 0) {
	$ModifResponse .= '$("#formulaire").prepend("<div id=\"error-label\" style=\"color:#dc3545;\">'.$errorTable->allTextInList().'<hr></div>");';
}
print($ModifResponse);
?>