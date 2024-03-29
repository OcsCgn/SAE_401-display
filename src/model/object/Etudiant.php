<?php


namespace src\model\object;

use src\model\DB;

class Etudiant{

	private int $id;
	private int $codeNip;
	private int $rang;
	private string $civilite;
	private string $nom;
	private string $prenom;
	private string $cursus;
	private string $bac;
	private string $specialite;
	private string $typeAdmission;
	private string $regAdmin;

	private function __construct(){}

	public static function newEtudiant(int $id, int $codeNip, int $rang, 
		string $civilite, string $nom, string $prenom, string $cursus, string $bac, string $specialite,
		string $typeAdmission, string $regAdmin){
		$obj = new Etudiant();
		$obj->id = $id;
		$obj->setCodeNip($codeNip);
		$obj->setRang($rang);
		$obj->setCivilite($civilite);
		$obj->setNom($nom);
		$obj->setPrenom($prenom);
		$obj->setCursus($cursus);
		$obj->setBac($bac);
		$obj->setSpecialite($specialite);
		$obj->setTypeAdmission($typeAdmission);
		$obj->setRegAdmin($regAdmin);
		$obj->save(true);
		return $obj;
	}

	public function delete(){
		$sql = "DELETE FROM Etudiant WHERE etudiantId = " . $this->id;
		DB::execRequest($sql);
	}

	private function save($first = false){
		if ($first){
			$sql = "INSERT INTO Etudiant (etudiantId, codeNip, rang, civilite, nom, prenom, cursus, bac, specialite, typeAdmission, regAdmin) VALUES (";
			$sql .= $this->id . ", ";
			$sql .= "$this->codeNip, $this->rang,";
			$sql .= "'$this->civilite', '$this->nom',";
			$sql .= "'$this->prenom', '$this->cursus',";
			$sql .= "'$this->bac', '$this->specialite',";
			$sql .= "'$this->typeAdmission', '$this->regAdmin'";
			$sql .= ")";
		} else {
			$sql = "UPDATE FROM Etudiant SET";
			$sql .= "codeNip = " . $this->codeNip;
			$sql .= ",rang = " . $this->rang;
			$sql .= ",civilite = '$this->civilite'";
			$sql .= ",nom = '$this->nom'";
			$sql .= ",prenom = '$this->prenom'";
			$sql .= ",cursus = '$this->cursus'";
			$sql .= ",bac = '$this->bac'";
			$sql .= ",specialite = '$this->specialite'";
			$sql .= ",typeAdmission = '$this->typeAdmission'";
			$sql .= ",regAdmin = '$this->regAdmin'";
			$sql .= " WHERE etudiantId = " . $this->id;
		}
		DB::execRequest($sql);
	}

	/**
	 * Get the value of regAdmin
	 */ 
	public function getRegAdmin()
	{
		return $this->regAdmin;
	}

	/**
	 * Set the value of regAdmin
	 *
	 * @return  self
	 */ 
	public function setRegAdmin($regAdmin)
	{
		$this->regAdmin = $regAdmin;

		return $this;
	}

	/**
	 * Get the value of typeAdmission
	 */ 
	public function getTypeAdmission()
	{
		return $this->typeAdmission;
	}

	/**
	 * Set the value of typeAdmission
	 *
	 * @return  self
	 */ 
	public function setTypeAdmission($typeAdmission)
	{
		$this->typeAdmission = $typeAdmission;

		return $this;
	}

	/**
	 * Get the value of specialite
	 */ 
	public function getSpecialite()
	{
		return $this->specialite;
	}

	/**
	 * Set the value of specialite
	 *
	 * @return  self
	 */ 
	public function setSpecialite($specialite)
	{
		$this->specialite = $specialite;

		return $this;
	}

	/**
	 * Get the value of bac
	 */ 
	public function getBac()
	{
		return $this->bac;
	}

	/**
	 * Set the value of bac
	 *
	 * @return  self
	 */ 
	public function setBac($bac)
	{
		$this->bac = $bac;

		return $this;
	}

	/**
	 * Get the value of cursus
	 */ 
	public function getCursus()
	{
		return $this->cursus;
	}

	/**
	 * Set the value of cursus
	 *
	 * @return  self
	 */ 
	public function setCursus($cursus)
	{
		$this->cursus = $cursus;

		return $this;
	}

	/**
	 * Get the value of prenom
	 */ 
	public function getPrenom()
	{
		return $this->prenom;
	}

	/**
	 * Set the value of prenom
	 *
	 * @return  self
	 */ 
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;

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
	 * Get the value of civilite
	 */ 
	public function getCivilite()
	{
		return $this->civilite;
	}

	/**
	 * Set the value of civilite
	 *
	 * @return  self
	 */ 
	public function setCivilite($civilite)
	{
		$this->civilite = $civilite;

		return $this;
	}

	/**
	 * Get the value of rang
	 */ 
	public function getRang()
	{
		return $this->rang;
	}

	/**
	 * Set the value of rang
	 *
	 * @return  self
	 */ 
	public function setRang($rang)
	{
		$this->rang = $rang;

		return $this;
	}

	/**
	 * Get the value of code_nip
	 */ 
	public function getCodeNip()
	{
		return $this->codeNip;
	}

	/**
	 * Set the value of code_nip
	 *
	 * @return  self
	 */ 
	public function setCodeNip($codeNip)
	{
		$this->codeNip = $codeNip;

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