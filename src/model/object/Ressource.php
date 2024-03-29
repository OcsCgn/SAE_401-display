<?php


namespace src\model\object;

use src\model\DB;

class Ressource{

	private int $id;
	private string $nom;
	private Bin $bin;
	private int $coef;

	private function __construct(){

	}

	public static function newRessource(string $nom, Bin $bin, int $coeff){
		$obj = new Ressource();
		$obj->setNom($nom);
		$obj->setBin($bin);
		$obj->setCoef($coeff);
		$obj->save(true);
		return $obj;
	}

	public function delete(){
		$sql = "DELETE FROM Ressource WHERE ressourceId = " . $this->id;
		DB::execRequest($sql);
	}

	private function save($first = false){
		if ($first){
			$sql = "INSERT INTO Ressource (nomRessource, binId, coef) VALUES (";
			$sql .= "'$this->nom', ".$this->bin->getId().", $this->coef";
			$sql .= ")";
		} else {
			$sql = "UPDATE Ressource SET ";
			$sql .= "nom  = '$this->nom'";
			$sql .= ", binId  = " . $this->bin->getId();
			$sql .= ", coef  = " . $this->coef;
			$sql .= " WHERE ressourceId = " . $this->id;
		}
		DB::execRequest($sql);
		if ( $first ) $this->id = DB::lastId();
	}

	/**
	 * Get the value of coef
	 */ 
	public function getCoef()
	{
		return $this->coef;
	}

	/**
	 * Set the value of coef
	 *
	 * @return  self
	 */ 
	public function setCoef($coef)
	{
		$this->coef = $coef;

		return $this;
	}

	/**
	 * Get the value of bin
	 */ 
	public function getBin()
	{
		return $this->bin;
	}

	/**
	 * Set the value of bin
	 *
	 * @return  self
	 */ 
	public function setBin($bin)
	{
		$this->bin = $bin;

		return $this;
	}

	/**
	 * Get the value of nom
	 */ 
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 *
	 * @return  self
	 */ 
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}
}