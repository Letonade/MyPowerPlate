<?php

function sqlStrNull($str){ if (is_null($str)) {return("NULL"); } else{return("'".$str."'");}}
function sqlStrVide($str){ if (is_null($str)) {return("''"); } else{return("'".$str."'");}}
function sqlDateNull($date){ if (is_null($date)) {return("NULL"); } else{return("'".$date."'");}}
function sqlIntNull($int){ if (is_null($int)) {return("NULL"); } else{return($int);}}
function sqlIntVide($int){ if (is_null($int)) {return("''"); } else{return($int);}}
function sqlIntZero($int){ if (is_null($int)) {return("'0'"); } else{return($int);}}
function sqlFloatNull($float){ if (is_null($float)) {return("NULL"); } else{return($float);}}
function sqlFloatVide($float){ if (is_null($float)) {return("''"); } else{return($float);}}
function sqlFloatZero($float){ if (is_null($float)) {return("'0'"); } else{return($float);}}

function arrayToList($array)
{
	$response = '<ul>';
	foreach ($array as $key => $value) {
		$response .= ' <li>' . $value;
	}
	$response .= '</ul>';
	return ($response);
}

/**
 * customErrArr
 */
class customGenericObject
{
	private $Arror = array();

	public function arror(){return($this->Arror);}
	
	public function addParam($nom)
	{
		$this->Arror[$nom] = array(
			'JQuery' 	=> '$("#'.$nom.'")',
			'actions' => array(),		// 	ex: '.addClass('laClasse')'
			'txts' 	=> array(),			// 	ex: "Libelle" => "MonLibelle"
			'values'	=> array()		//	ex: "NbArg" => 23
		);
	}
	
	public function actionPush($nom, $where, $action)
	{
		//array_push($this->Arror[$nom]["actions"],$action);
		$this->Arror[$nom]["actions"][$where] = $action;
		return(1);
	}
	
	public function txtPush($nom, $where, $txt)
	{
		$this->Arror[$nom]["txts"][$where] = $txt;
		return(1);
	}
	
	public function valuePush($nom, $where, $value)
	{
		$this->Arror[$nom]["values"][$where] = $value;
		return(1);
	}
	
	public function allActionInline()
	{
		$inline = '';
		if (func_num_args() > 0) 
		{
			$param = func_get_arg(0);
			foreach ($this->Arror[$param]["actions"] as $key => $action) 
				$inline .= $this->Arror[$param]['JQuery'].$action.";";
			return ($inline);		
		}
		else 
		{	
			foreach ($this->Arror as $param => $arr_options) 
				foreach ($arr_options["actions"] as $key => $action) 
					$inline .= $arr_options['JQuery'].$action.";";
			return ($inline);
		}
	}
	
	public function countTextLine()
	{
		$counter = 0;
		if (func_num_args() > 0) 
		{
			$param = func_get_arg(0);
			return (count($this->Arror[$param]["txts"]));		
		}
		else 
		{	
			foreach ($this->Arror as $param => $arr_options) 
				$counter += count($arr_options["txts"]); 
					return ($counter);
		}
	}
	
	public function allTextInList()
	{
		$inList = '<ul>';
		if (func_num_args() > 0) 
		{
			$param = func_get_arg(0);
			foreach ($this->Arror[$param]["txts"] as $key => $action) 
				$inList .= "<li>".$action."</li>";
			return ($inList.'</ul>');		
		}
		else 
		{	
			foreach ($this->Arror as $param => $arr_options) 
				foreach ($arr_options["txts"] as $key => $action) 
					$inList .= "<li>".$action."</li>";
			return ($inList.'</ul>');
		}
	}
	
	public function countTextLineNamed($Name)
	{
		$counter = 0;	
		foreach ($this->Arror as $param => $arr_options) 
			if (isset($arr_options["txts"][$Name]))
				$counter += 1; 
		return ($counter);
		
	}

		public function allTextInListName($Name)
	{
		$MinimumResult = 0;
		$inList = '<ul>';
		foreach ($this->Arror as $param => $arr_options) 
			foreach ($arr_options["txts"] as $key => $action) 
				if (isset($arr_options["txts"][$Name])) 
				{
					$MinimumResult = 1;
					$inList .= "<li>".$action."</li>";
				}
		if ($MinimumResult > 0)
			return ($inList.'</ul>');
		else
			return ("");
	}
}

?>