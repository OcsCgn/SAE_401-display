<?php

namespace src\model\object;

use src\model\DB;

class Semestre{

	private int $id;
	private string $nom;

	private function __construct(){

	}

	public static function newSemestre(string $nom){
		$obj = new Semestre();
		$obj->setNom($nom);
		$obj->save(true);
		return $obj;
	}

	public function delete(){
		$sql = "DELETE FROM Semestre WHERE semestreId = " . $this->id;
		DB::execRequest($sql);
	}

	private function save($first = false){
		if ($first){
			$sql = "INSERT INTO Semestre (nomSemestre) VALUES (";
			$sql .= "'$this->nom'";
			$sql .= ")";
		} else {
			$sql = "UPDATE Semestre SET ";
			$sql .= "nomSemestre = '$this->nom'";
			$sql .= " WHERE semestreId = " . $this->id;
		}
		DB::execRequest($sql);
		if ( $first ) $this->id = DB::lastId();
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