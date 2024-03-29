<?php

namespace src\model\object;

use src\model\DB;

class EtudiantSemestre{

	private int $id;
	private Semestre $semestre;
	private Etudiant $etudiant;
	private int $absence;
	private int $absenceJustifiee;
	private int $ueValidee;
	private float $bonus;

	private function __construct(){

	}

	public static function newEtudiantSemestre(Semestre $semestre, Etudiant $etudiant, int $absence, int $absenceJustifiee, int $ueValidee, float $bonus){
		$obj = new EtudiantSemestre();
		$obj->setSemestre($semestre);
		$obj->setEtudiant($etudiant);
		$obj->setAbsence($absence);
		$obj->setAbsenceJustifiee($absenceJustifiee);
		$obj->setUeValidee($ueValidee);
		$obj->setBonus($bonus);
		$obj->save(true);
		return $obj;
	}

	public function delete(){
		$sql = "DELETE FROM EtudiantSemestre WHERE etudiantSemestreId = " . $this->id;
		DB::execRequest($sql); 
	}

	public function save($first = false){
		if ($first){
			$sql = "INSERT INTO EtudiantSemestre (semestreId, etudiantId, absence, absenceJustifiee, ueValidee, bonus) VALUES (";
			$sql .= $this->semestre->getId() . ", " . $this->etudiant->getId() . ", ";
			$sql .= $this->absence . ", " . $this->absenceJustifiee . ", ";
			$sql .= $this->ueValidee . ", " . $this->bonus;
			$sql .= ")";
		} else {
			$sql = "UPDATE EtudiantSemestre SET ";
			$sql .= "semestreId = " . $this->semestre->getId();
			$sql .= ", etudiantId = " . $this->etudiant->getId();
			$sql .= ", absence = " . $this->absence;
			$sql .= ", absenceJustifiee = " . $this->absenceJustifiee;
			$sql .= ", ueValidee = " . $this->ueValidee;
			$sql .= ", bonus = " . $this->bonus;
			$sql .= " WHERE etudiantSemestreId = " . $this->id;
		}
		DB::execRequest($sql);
		if ( $first ) $this->id = DB::lastId();
	}

	


	/**
	 * Get the value of bonus
	 */ 
	public function getBonus()
	{
		return $this->bonus;
	}

	/**
	 * Set the value of bonus
	 *
	 * @return  self
	 */ 
	public function setBonus($bonus)
	{
		$this->bonus = $bonus;

		return $this;
	}

	/**
	 * Get the value of ueValidee
	 */ 
	public function getUeValidee()
	{
		return $this->ueValidee;
	}

	/**
	 * Set the value of ueValidee
	 *
	 * @return  self
	 */ 
	public function setUeValidee($ueValidee)
	{
		$this->ueValidee = $ueValidee;

		return $this;
	}

	/**
	 * Get the value of absenceJustifiee
	 */ 
	public function getAbsenceJustifiee()
	{
		return $this->absenceJustifiee;
	}

	/**
	 * Set the value of absenceJustifiee
	 *
	 * @return  self
	 */ 
	public function setAbsenceJustifiee($absenceJustifiee)
	{
		$this->absenceJustifiee = $absenceJustifiee;

		return $this;
	}

	/**
	 * Get the value of absence
	 */ 
	public function getAbsence()
	{
		return $this->absence;
	}

	/**
	 * Set the value of absence
	 *
	 * @return  self
	 */ 
	public function setAbsence($absence)
	{
		$this->absence = $absence;

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
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}
}