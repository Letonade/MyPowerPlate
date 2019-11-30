<?php include '../inc/application_include.php'?>
<?php include $MyHomePath.'assets/inc/include_vue.php'; ?>

<?php
$validate = 0;
// password_hash($TEST,PASSWORD_BCRYPT);
// password_verify("Pass", $TEST);
$ModifResponse = '';
$MyView = new Vue;
$MyView->Password($_POST["password"]);
$MyView->VueName($_POST["sessionId"]);

$errorTable = new customGenericObject;
$errorTable->addParam("password");$errorTable->actionPush("password", 'err', ".removeClass('is-invalid')");
$errorTable->addParam("sessionId");$errorTable->actionPush("sessionId", 'err', ".removeClass('is-invalid')");

if ($MyView->VueName() != NULL 
	&& $MyView->VueName() != "" 
	&& strlen($MyView->VueName()) >= constant("VUE_ID_LENGTH_MIN")
	&& strlen($MyView->VueName()) <= constant("VUE_ID_LENGTH_MAX")) 
{
	if ($MyView->Password() != NULL 
		&& $MyView->Password() != "" 
		&& strlen($MyView->Password()) >= constant("VUE_MDP_LENGTH_MIN")
		&& strlen($MyView->Password()) <= constant("VUE_MDP_LENGTH_MAX")) 
	{
		$MyView = Vue_SelectOneByNameAndPassword($MyView);
		if (is_object($MyView) && $MyView->IdVue() != NULL) {
			$validate = 1;
		}

		if($validate === 1) {
			$ModifResponse = '
			$("#RealViewId").remove();
			$("#formulaire").prepend("<div><input type=\'hidden\' id=\'RealViewId\' name=\'RealViewId\' value=\''.$MyView->IdVue().'\'></div>");
			$("#formulaire").attr("action","./EcranVue.php");
			$("#formulaire").attr("target","");
			$("#formulaire").submit();';
		}else
		{/* Dans ce cas on ne trouve pas de vue a ces information. */
			if (Vue_FindOneByVueName($_POST["sessionId"]) == 1) {
				$errorTable->txtPush("password",'err', 'Mot de passe invalide.');
				$errorTable->actionPush('password', 'err', '.addClass("is-invalid")');
			}else
			{
				if ($_POST["action"] == "verification"){$ModifResponse = '
					if(confirm("Aucune session de ce nom.\nVoulez vous créer cette Session ?"))
					{fct_verifier_connexion("ajout_accord");};';}
				elseif ($_POST["action"] == "ajout_accord") {
					$MyView->Password(password_hash($_POST["password"], PASSWORD_BCRYPT));
					$MyView->VueName($_POST["sessionId"]);
					$MyView->Actif(1);
					$MyView->LastActifDate(Date('Y-m-d H:i:s'));
					Vue_Insert($MyView);
				}
			}
		}
	}else
	{/* Ce cas correspond au manque de password */

		$errorTable->txtPush("password",'err', 'Le mot de passe doit faire entre '.constant("VUE_MDP_LENGTH_MIN").' et '.constant("VUE_MDP_LENGTH_MAX").' caracteres.');
		$errorTable->actionPush('password', 'err', '.addClass("is-invalid")');
	}
}else{/* Cas de session Vide */
	$errorTable->txtPush("sessionId",'err', 'L\'Id de session doit faire entre '.constant("VUE_ID_LENGTH_MIN").' et '.constant("VUE_ID_LENGTH_MAX").' caracteres.');
	$errorTable->actionPush('sessionId', 'err', '.addClass("is-invalid")');

	if ($MyView->Password() == NULL 
		|| $MyView->Password() == "" 
		|| strlen($MyView->Password()) < constant("VUE_MDP_LENGTH_MIN")
		|| strlen($MyView->Password()) > constant("VUE_MDP_LENGTH_MAX")) 
	{/* Ce cas correspond au manque de password */		
		$errorTable->txtPush("password",'err', 'Le mot de passe doit faire entre '.constant("VUE_MDP_LENGTH_MIN").' et '.constant("VUE_MDP_LENGTH_MAX").' caracteres.');
		$errorTable->actionPush('password', 'err', '.addClass("is-invalid")');
	}

}
/* Résolution */
$ModifResponse .= '$("#error-label").remove();'.$errorTable->allActionInline();
if ($errorTable->countTextLine() > 0) {
	$ModifResponse .= '$("#formulaire").prepend("<div id=\"error-label\" style=\"color:#dc3545;\">'.$errorTable->allTextInList().'<hr></div>");';
}
print($ModifResponse);
?>