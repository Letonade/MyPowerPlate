<?php

include '../inc/application_include.php';
include $MyHomePath.'assets/php/class/ModuleElectricite.class.php';
include $MyHomePath.'assets/php/DAO/ModuleElectricite.DAO.php';

// print_r("TEST");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
<?php



/* phase de test de : DAO - SELECT ALL*/
	print("<hr><h2>Test du SelectAll</h2>");
	$ModuleElectricite_list = ModuleElectricite_SelectAll();
	foreach ($ModuleElectricite_list as $key => $value) {
		print_r(print_r($value->Consommation(),1)."<br>");
	}
	print("<hr>");

/* phase de test de : DAO - SELECT ONE*/
	print("<hr><h2>Test du SelectOne</h2>");
	$ModuleElectricite = new ModuleElectricite;
	$ModuleElectricite->IdModuleElectricite(12);
	$ModuleElectricite = ModuleElectricite_SelectOne($ModuleElectricite);
	if ($ModuleElectricite)
	{
		print_r(print_r($ModuleElectricite->Consommation(),1)."<br>");
	}
	print("<hr>");

/* phase de test de : DAO - INSERT*/
	print("<hr><h2>Test du Insert</h2>");
	$ModuleElectricite = new ModuleElectricite;
	$ModuleElectricite->IdModuleElectricite(NULL);
	$ModuleElectricite->Consommation(75.25);
	$ret = ModuleElectricite_Insert($ModuleElectricite);
	foreach ($ModuleElectricite as $key => $value) {
		print_r(print_r($value->Consommation(),1)."- c<br>");
	}
	$ModuleElectricite_list = ModuleElectricite_SelectAll();
	foreach ($ModuleElectricite_list as $key => $value) {
		print_r(print_r($value->Consommation(),1)."<br>");
	}
	//print("Retour: ".print_r($ret,1));
	$ModuleElectricite = $ret;
	print("<hr>");
	
/* phase de test de : DAO - UPDATE*/
	print("<hr><h2>Test du Update</h2>");
	$ModuleElectricite->Consommation(122);
	$ret = ModuleElectricite_Update($ModuleElectricite);
	foreach ($ModuleElectricite as $key => $value) {
		print_r(print_r($value->Consommation(),1)."- c<br>");
	}
	$ModuleElectricite_list = ModuleElectricite_SelectAll();
	foreach ($ModuleElectricite_list as $key => $value) {
		print_r(print_r($value->Consommation(),1)."<br>");
	}
	$ModuleElectricite = $ret;
	print("<hr>");

/* phase de test de : DAO - DELETE*/
	print("<hr><h2>Test du Delete</h2>");
	$ret = ModuleElectricite_Delete($ModuleElectricite);
	$ModuleElectricite_list = ModuleElectricite_SelectAll();
	foreach ($ModuleElectricite_list as $key => $value) {
		print_r(print_r($value->Consommation(),1)."<br>");
	}
	//print("Retour: ".print_r($ret,1));
	print("<hr>");


?>
</body>
</html>