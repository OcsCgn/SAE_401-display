<?php


namespace src\model\object;

use src\model\DB;

class Note{

	private int $id;
	private int $note;
	private Etudiant $etudiant;
	private Ressource $ressource;

	private function __construct(){

	}

	public static function newNote(int $note, Etudiant $etudiant, Ressource $ressource){
		$obj = new Note();
		$obj->setNote($note);
		$obj->setEtudiant($etudiant);
		$obj->setRessource($ressource);
		$obj->save(true);
		return $obj;
	}

	public function delete(){
		$sql = "DELETE FROM Note WHERE noteId = " . $this->id;
		DB::execRequest($sql);
	}

	private function save($first = false){
		if ($first){
			$sql = "INSERT INTO Note (note, etudiantId, ressourceId) VALUES (";
			$sql .= $this->note . ", " . $this->etudiant->getId() . ", ";
			$sql .= $this->ressource->getId();
			$sql .= ")";
		} else {
			$sql = "UPDATE Note SET";
			$sql .= "note = " . $this->note;
			$sql .= ", etudiantId  = " . $this->etudiant->getId();
			$sql .= ", ressourceId = " . $this->ressource->getId();
			$sql .= " WHERE noteId = " . $this->id;
		}
		DB::execRequest($sql);
		if ( $first ) $this->id = DB::lastId();
	}

	/**
	 * Get the value of note
	 */ 
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * Set the value of note
	 *
	 * @return  self
	 */ 
	public function setNote($note)
	{
		$this->note = $note;

		return $this;
	}

	/**
	 * Get the value of ressource
	 */ 
	public function getRessource()
	{
		return $this->ressource;
	}

	/**
	 * Set the value of ressource
	 *
	 * @return  self
	 */ 
	public function setRessource($ressource)
	{
		$this->ressource = $ressource;

		return $this;
	}

	/**
	 * Get the value of etudiant
	 */ 
	public function getEtudiant()
	{
		return $this->etudiant;
	}

	/**
	 * Set the value of etudiant
	 *
	 * @return  self
	 */ 
	public function setEtudiant($etudiant)
	{
		$this->etudiant = $etudiant;

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