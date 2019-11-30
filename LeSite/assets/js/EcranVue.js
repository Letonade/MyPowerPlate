function fct_charger_modules_container(id_container)
{
	var action = "charger_modules_container"
	var param = new Array();
	param.push("action=" + action);
	param.push("id_container=" + id_container);

	var Request = $.ajax({
		url: 			'./assets/php/EcranVueModif.php',
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