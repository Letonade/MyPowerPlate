<?php

include '../inc/application_include.php';
include $MyHomePath.'assets/php/class/Container.class.php';
include $MyHomePath.'assets/php/DAO/Container.DAO.php';

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
	$Container_list = Container_SelectAll();
	foreach ($Container_list as $key => $value) {
		print_r(print_r($value->Libelle(),1)."<br>");
	}
	print("<hr>");

/* phase de test de : DAO - SELECT ONE*/
	print("<hr><h2>Test du SelectOne</h2>");
	$Container = new Container;
	$Container->IdContainer(2);
	$Container = Container_SelectOne($Container);
	print_r(print_r($Container->Libelle(),1)."<br>");
	print("<hr>");

/* phase de test de : DAO - INSERT*/
	print("<hr><h2>Test du Insert</h2>");
	$Container->IdContainer(NULL);
	$Container->Libelle("AT-AT");
	$Container->DateAcquisition(date('Y-m-d'));
	$ret = Container_Insert($Container);
	foreach ($Container as $key => $value) {
		print_r(print_r($value->Libelle(),1)."- c<br>");
	}
	$Container_list = Container_SelectAll();
	foreach ($Container_list as $key => $value) {
		print_r(print_r($value->Libelle(),1)."<br>");
	}
	//print("Retour: ".print_r($ret,1));
	$Container = $ret;
	print("<hr>");
	
/* phase de test de : DAO - UPDATE*/
	print("<hr><h2>Test du Update</h2>");
	$Container->Libelle("AT-ST");
	$ret = Container_Update($Container);
	foreach ($Container as $key => $value) {
		print_r(print_r($value->Libelle(),1)."- c<br>");
	}
	$Container_list = Container_SelectAll();
	foreach ($Container_list as $key => $value) {
		print_r(print_r($value->Libelle(),1)."<br>");
	}
	$Container = $ret;
	print("<hr>");

/* phase de test de : DAO - DELETE*/
	print("<hr><h2>Test du Delete</h2>");
	$ret = Container_Delete($Container);
	$Container_list = Container_SelectAll();
	foreach ($Container_list as $key => $value) {
		print_r(print_r($value->Libelle(),1)."<br>");
	}
	//print("Retour: ".print_r($ret,1));
	print("<hr>");


?>
</body>
</html>