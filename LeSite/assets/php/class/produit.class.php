<?php
class Produit{

	private $var_idProduit;
	private $var_libelle;
	private $var_categorie;
	private $var_marque;
	private $var_quantite;
	private $var_prixUnitaire;
	private $var_tva;
	private $var_description;
	private $var_reference;
	private $var_lienImage;

	public function IdProduit(){
		if (func_num_args() > 0) {$this->var_idProduit = func_get_arg(0);}
		else {return($this->var_idProduit);}
	}

	public function Libelle(){
		if (func_num_args() > 0) {$this->var_libelle = func_get_arg(0);}
		else {return($this->var_libelle);}
	}

	public function Categorie(){
		if (func_num_args() > 0) {$this->var_categorie = func_get_arg(0);}
		else {return($this->var_categorie);}
	}

	public function Marque(){
		if (func_num_args() > 0) {$this->var_marque = func_get_arg(0);}
		else {return($this->var_marque);}
	}

	public function Quantite(){
		if (func_num_args() > 0) {$this->var_quantite = func_get_arg(0);}
		else {return($this->var_quantite);}
	}

	public function PrixUnitaire(){
		if (func_num_args() > 0) {$this->var_prixUnitaire = func_get_arg(0);}
		else {return($this->var_prixUnitaire);}
	}

	public function Tva(){
		if (func_num_args() > 0) {$this->var_tva = func_get_arg(0);}
		else {return($this->var_tva);}
	}

	public function Description(){
		if (func_num_args() > 0) {$this->var_description = func_get_arg(0);}
		else {return($this->var_description);}
	}

	public function Reference(){
		if (func_num_args() > 0) {$this->var_reference = func_get_arg(0);}
		else {return($this->var_reference);}
	}

	public function LienImage(){
		if (func_num_args() > 0) {$this->var_lienImage = func_get_arg(0);}
		else {return($this->var_lienImage);}
	}

	public function ProductForm(){
		print_r("<form>");
		foreach ($this as $key => $value) {
			print_r('
				<div class="form-group">
					<label for="exampleInputEmail1">'.substr($key,4).'</label>
					<input type="text" class="form-control" id="'.substr($key,4).'" value="'.$value.'">
					<small id="" class="form-text text-muted">On edit '.substr($key,4).'</small>
				</div>');
		}
		print_r("</form>");
	}

}
?>