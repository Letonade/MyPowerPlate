<?php 
include '../../inc/application_include.php';


$connAllTables = new APP_BDD;
$tdStyle = "";
$sql = "";
// Ressort le nom de la base
if ($result = $connAllTables->link->query("SHOW TABLES")) {
    $tdStyle= "style='width:".(90/mysqli_num_rows($result))."%;display:inline-block;'";
// Début du tableau
	echo "<table style='display:block;'><tbody style='display:block;'>";

// Ligne de titre
		echo "<tr style='display:block;'>";
    		foreach ($result as $key => $val) {
				echo "<td ".$tdStyle.">Table [".$val["Tables_in_".APP_BDD_BASE]."]</td>";
			}
		echo "</tr>";
// Ligne de class
	generateClass($result,$tdStyle);
// Ligne de DAO
	generateDAO($result,$tdStyle);

	echo "</tbody></table>";
}
$result->close();
unset($connAllTables);



function autoGenVarNaming($str, $pre = "", $Camel = 1, $full = -1)
{

	if ($Camel == 1) {
	$Camel = explode("_",$str);
	$str = $pre;
		foreach ($Camel as $key => $value) {
			if (!($full <> 1 && $key == 0)) {
				$Camel[$key][0] = strtoupper($value[0]);
			}
			$str .= $Camel[$key];	
		}
	}else{
		$str = $pre.$str;
	}
	return $str;
}

function generateClass($result, $tdStyle)
{
	$txt = "";
	$txtGetterSetter = "";
// Ligne de classe
	echo "<tr style='display:block;'>";
		foreach ($result as $key => $val) {
// Récupération des données
			$connTable = new APP_BDD;
			$sql = "SHOW COLUMNS FROM ".$val["Tables_in_".APP_BDD_BASE].";";
			if ($res = $connTable->link->query($sql)) {
// Génération des classes
			$txt = "<?php\nclass ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."{\n\n";
				foreach ($res as $k => $v) {
					// On peut afficher tous les champs
					//print_r("[".$val["Tables_in_".APP_BDD_BASE]."].[". autoGenVarNaming$v["Field"]), "", 1, 1."]<br>");
					$txt .= "private $".autoGenVarNaming($v["Field"],"var_",0).";\n";
					$txtGetterSetter .= "public function ".autoGenVarNaming($v["Field"],"",1,1)."(){\n\tif (func_num_args() > 0) {".'$this'."->".autoGenVarNaming($v["Field"],"var_",0)." = func_get_arg(0);}\n\telse {return(".'$this'."->".autoGenVarNaming($v["Field"],"var_",0).");}\n}\n\n";
				}
			$txt .= "\n".$txtGetterSetter;
			$txtGetterSetter = "";
			$txt .= "}\n?>";
			}
// Affichage des données
			echo "<td ".$tdStyle."><textarea style='width:100%;'>".$txt."</textarea></td>";
			// On oublie pas de détruire la connexion
			unset($connTable);
		}
	echo "</tr>";
return(1);
}

function generateDAO($result, $tdStyle)
{
	$txt = "";
// Ligne de DAO
	echo "<tr style='display:block;'>";
		foreach ($result as $key => $val) {
// Récupération des données
			$connTable = new APP_BDD;
			$sql = "SHOW COLUMNS FROM ".$val["Tables_in_".APP_BDD_BASE].";";
			if ($res = $connTable->link->query($sql)) {
// Génération des DAO
			$txt = "<?php";
			$txt .= "\n".generateDAO_Insert			($val, $res);
			$txt .= "\n".generateDAO_Update			($val, $res);
			$txt .= "\n".generateDAO_DeleteByPk		($val, $res);
			$txt .= "\n".generateDAO_SelectAll		($val, $res);
			$txt .= "\n".generateDAO_SelectOneByPk	($val, $res);
			$txt .= "\n".generateDAO_AllCol			($val, $res);
			$txt .= "\n?>";
			}
// Affichage des données
			echo "<td ".$tdStyle."><textarea style='width:100%;'>".$txt."</textarea></td>";
			// On oublie pas de détruire la connexion
			unset($connTable);
		}
	echo "</tr>";
return(1);
}
// datetime
// varchar
// int
function generateDAO_Insert($val, $res)
{
	$txt = "function ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_Insert($"."obj)\n{\n";
	$txt .= "$"."connQuery = new APP_BDD;\n";
	$txt .= "$"."sql = 'INSERT INTO ".$val["Tables_in_".APP_BDD_BASE]." VALUES (\n";
	$firstPk = 0;
	$response = "";
	foreach ($res as $k => $v) {
		if ($k <> 0) {
			$txt .= ", ";
		}
		switch (explode("(",$v["Type"] )[0]) {
			case 'datetime':
				$txt .= "'.sqlDateNull(";
				break;
			case 'varchar' or 'text':
				$txt .= "'.sqlStrNull(";
				break;
			case 'int':
				$txt .= "'.sqlIntNull(";
				break;
			case 'float':
				$txt .= "'.sqlFloatNull(";
				break;
			default:
				return("error - Case SQLFUNC Not find.(Insert)".explode("(",$v["Type"] )[0]);
				break;
		}
		$txt .= "$"."obj->".autoGenVarNaming($v["Field"], "", 1, 1)."()";
		$txt .= ").'\n";
		if ($v['Key'] == 'PRI'){
			if ($firstPk == 0 ) {
				$response .= "$"."obj->".autoGenVarNaming($v["Field"], "", 1, 1)."(mysqli_insert_id($"."connQuery->link));\n";
				$response .= "$"."obj = ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_SelectOne($"."obj);\n";
				$firstPk = 1;
			}
		}
	}
	if (substr($txt, -1) == "\n") {$txt = substr($txt,0,strlen($txt)-1);}
	$txt .= ")';\n";
	$txt .= " if ($"."res = $"."connQuery->link->query($"."sql)) {\n";
	$txt .= $response;
	$txt .= "unset($"."connQuery);\nreturn($"."obj);\n";
	$txt .= "}else{unset($"."connQuery);\nreturn('error, insert failed.');\n}\n";
	$txt .= "}\n";
	return($txt);
}

function generateDAO_Update($val, $res)
{
	$NoPk = 1;
	$txt = "function ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_Update($"."obj)\n{\n";
	$txt .= "$"."connQuery = new APP_BDD;\n";
	$txt .= "$"."sql = 'UPDATE ".$val["Tables_in_".APP_BDD_BASE]." SET \n";
	foreach ($res as $k => $v) {
		if ($k <> 0) {
			$txt .= ", ";
		}
		$txt .= $v["Field"]." = ";
		switch (explode("(",$v["Type"] )[0]) {
			case 'datetime':
				$txt .= "'.sqlDateNull(";
				break;
			case 'varchar' or 'text':
				$txt .= "'.sqlStrNull(";
				break;
			case 'int':
				$txt .= "'.sqlIntNull(";
				break;
			case 'float':
				$txt .= "'.sqlFloatNull(";
				break;
			default:
				return("error - Case SQLFUNC Not find.(Update)".explode("(",$v["Type"] )[0]);
				break;
		}
		$txt .= "$"."obj->".autoGenVarNaming($v["Field"], "", 1, 1)."()";
		$txt .= ").'\n";
	}
	$txt .= " WHERE \n";
	foreach ($res as $k => $v) {
		if ($v['Key'] == 'PRI'){
			if ($NoPk == 0 ) {
				$txt .= " AND ";
			}
			$txt .= $v["Field"]." = '.$"."obj->".autoGenVarNaming($v["Field"], "", 1, 1)."().'\n";
			$NoPk = 0;
		}
	}
	$txt .= "';\n";
	$txt .= " if ($"."res = $"."connQuery->link->query($"."sql)) {\nunset($"."connQuery);\nreturn($"."obj);\n";
	$txt .= "}else{unset($"."connQuery);\nreturn('error, update failed.');\n}\n";
	$txt .= "}\n";
	if ($NoPk == 1) {$txt = "";}
	return($txt);
}
//DELETE FROM `container` WHERE `container`.`id_container` = 9;
function generateDAO_DeleteByPk($val, $res)
{
	$NoPk = 1;
	$txt = "function ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_Delete($"."obj)\n{\n";
	$txt .= "$"."connQuery = new APP_BDD;\n";
	$txt .= "$"."sql = 'DELETE FROM ".$val["Tables_in_".APP_BDD_BASE]." WHERE \n";
	foreach ($res as $k => $v) {
		if ($v['Key'] == 'PRI'){
			if ($NoPk == 0 ) {
				$txt .= " AND ";
			}
			$txt .= $v["Field"]." = '.$"."obj->".autoGenVarNaming($v["Field"], "", 1, 1)."().'\n";
			$NoPk = 0;
		}
	}
	$txt .= "';\n";
	$txt .= " if ($"."res = $"."connQuery->link->query($"."sql)) {\nunset($"."connQuery);\nreturn(NULL);\n";
	$txt .= "}else{unset($"."connQuery);\nreturn('error, delete failed.');\n}\n";
	$txt .= "}\n";
	if ($NoPk == 1) {$txt = "";}
	return($txt);
}

function generateDAO_SelectAll($val, $res)
{
	$txt = "function ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_SelectAll()\n{\n";
	$txt .= "$"."connQuery = new APP_BDD;\n";
	$txt .= "$"."sql = 'SELECT * FROM ".$val["Tables_in_".APP_BDD_BASE];
	$txt .= "';\n";
	$txt .= "$"."temp_coll = array();\n";
	$txt .= "if ($"."res = $"."connQuery->link->query($"."sql))\n{\n";
	$txt .= "foreach ($"."res as $"."key => $"."val) {\n";
	$txt .= "$"."temp_obj = new ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1).";\n";
	foreach ($res as $key => $value) {
		//print_r("TT-".print_r($value,1)."<br>");
		$txt .= "$"."temp_obj->".autoGenVarNaming($value["Field"], "", 1, 1)."($"."val['".$value["Field"]."']);\n";
	}
	$txt .= "array_push($"."temp_coll, $"."temp_obj);\n}\nreturn $"."temp_coll;\n}\nelse\n{\n";
	$txt .= "unset($"."connQuery);\nreturn('error, select all failed.');\n}\n";
	$txt .= "unset($"."connQuery);\nreturn(1);\n}\n";
	return($txt);
}

function generateDAO_SelectOneByPk($val, $res)
{
	$NoPk = 1;
	$txt = "function ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_SelectOne($"."obj)\n{\n";
	$txt .= "$"."connQuery = new APP_BDD;\n";
	$txt .= "$"."temp_obj = new ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1).";\n";
	$txt .= "$"."sql = 'SELECT * FROM ".$val["Tables_in_".APP_BDD_BASE]." WHERE \n";
	foreach ($res as $k => $v) {
		if ($v['Key'] == 'PRI'){
			if ($NoPk == 0 ) {
				$txt .= " AND ";
			}
			$txt .= $v["Field"]." = '.$"."obj->".autoGenVarNaming($v["Field"], "", 1, 1)."().'\n";
			$NoPk = 0;
		}
	}
	$txt .= "';\n";
	$txt .= "if ($"."res = $"."connQuery->link->query($"."sql))\n{\n";
	$txt .= "foreach ($"."res as $"."key => $"."val) {\n";
	foreach ($res as $key => $value) {
		//print_r("TT-".print_r($value,1)."<br>");
		$txt .= "$"."temp_obj->".autoGenVarNaming($value["Field"], "", 1, 1)."($"."val['".$value["Field"]."']);\n";
	}
	$txt .= "}\nreturn $"."temp_obj;\n}\nelse\n{\n";
	$txt .= "unset($"."connQuery);\nreturn('error, select one failed.');\n}\n";
	$txt .= "unset($"."connQuery);\nreturn(1);\n}\n";
	return($txt);
}

function generateDAO_AllCol($val, $res)
{
	$txt = "function ".autoGenVarNaming($val["Tables_in_".APP_BDD_BASE],"",1,1)."_AllCol($"."obj)\n{\n";
	$txt .= " return('";
	foreach ($res as $k => $v) {
		if ($k <> 0) {
			$txt .= "\n, ";
		}
		$txt .= $v['Field'];
	}
	$txt .= "');\n}\n";
	return($txt);
}

?>


