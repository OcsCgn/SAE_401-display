<?php


namespace src\model\object;

use src\model\DB;

class Bin{

	private int $id;
	private string $nom;
	private Semestre $semestre;

	private function __construct(){}

	public static function newBin(string $nom, Semestre $semestre){
		$bin = new Bin();
		$bin->setNom($nom);
		$bin->setSemestre($semestre);
		$bin->save(true);
		return $bin;
	}

	public function delete(){
		$sql = "DELETE FROM Bin WHERE binId = " . $this->id;
		DB::execRequest($sql);
	}

	public function save($first = false){
		if ($first){
			$sql = "INSERT INTO Bin (nomBin, semestreId) VALUES (";
			$sql .= "'$this->nom', " . $this->semestre->getId() . ")";
		} else {
			$sql = "UPDATE FROM Bin SET";
			$sql .= "nomBin = '$this->nom',";
			$sql .= "semestreId = '".$this->semestre->getId()."'";
			$sql .= "WHERE binId = '$this->id',";
		}
		DB::execRequest($sql);
		if ( $first ) $this->id = DB::lastId();
	}


	/**
	 * Get the value of semestre
	 */ 
	public function getSemestre()
	{
		return $this->semestre;
	}

	/**
	 * Set the value of semestre
	 *
	 * @return  self
	 */ 
	public function setSemestre($semestre)
	{
		$this->semestre = $semestre;
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