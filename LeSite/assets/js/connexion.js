function fct_verifier_connexion	(action)
{
	var param = new Array();
	param.push("action=" + action);
	param.push("userProfil=" + $("#userProfil :selected").val());
	param.push("userLogin=" + $("#userLogin").val());
	param.push("userPassword=" + $("#userPassword").val());

	var Request = $.ajax({
		url: 			'./assets/php/compte_connexionScript.php',
		data: 			param.join('&'),
		method: 		"POST",
		dataType: 		"script"
	});

	Request.done(function(msg)
	{
		console.log("action: " + action + " - Request done : " + msg);
	});

	Request.fail(function(jqXHR, textStatus)
	{
		console.log(jqXHR);
		console.log("action: " + action + " - Request failed : " + textStatus);
	});

}

function fct_creer_compte	(action)
{
	var param = new Array();
	param.push("action=" + action);
	param.push("userProfil=" + $("#userProfil :selected").val());
	param.push("userLogin=" + $("#userLogin").val());
	param.push("userPassword=" + $("#userPassword").val());

	var Request = $.ajax({
		url: 			'./assets/php/compte_creationScript.php',
		data: 			param.join('&'),
		method: 		"POST",
		dataType: 		"script"
	});

	Request.done(function(msg)
	{
		console.log("action: " + action + " - Request done : " + msg);
	});

	Request.fail(function(jqXHR, textStatus)
	{
		console.log(jqXHR);
		console.log("action: " + action + " - Request failed : " + textStatus);
	});

}