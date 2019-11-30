function fct_verifier_connexion	(action)
{
	var param = new Array();
	param.push("action=" + action);
	param.push("sessionId=" + $("#sessionId").val());
	param.push("password=" + $("#password").val());

	var Request = $.ajax({
		url: 			'./assets/php/SessionModif.php',
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