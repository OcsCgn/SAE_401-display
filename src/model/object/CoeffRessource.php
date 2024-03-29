<?php


namespace src\model\object;

use src\model\DB;

class CoeffRessource{

	private int $id;
	private Bin $bin;
	private Ressource $ressource;
	private int $coeff;

	private function __construct(){}

	public static function newCoeffRessource(Bin $bin, Ressource $ressource, int $coeff){
		$obj = new CoeffRessource();
		$obj->setBin($bin);
		$obj->setRessource($ressource);
		$obj->setCoeff($coeff);
		$obj->save(true);
		return $obj;
	}

	public function delete(){
		$sql = "DELETE FROM CoeffRessource WHERE coeffRessourceId = " . $this->id;
		DB::execRequest($sql);
	}

	private function save($first = false){
		if ($first){
			$sql = "INSERT INTO CoeffRessource (binId, ressourceId, coeff) VALUES (";
			$sql .= $this->bin->getId(). ", ".$this->ressource->getId().", $this->coeff)";
		} else {
			$sql = "UPDATE CoeffRessource SET ";
			$sql .= "binId = ".$this->bin->getId().", ";
			$sql .= "ressourceId = ".$this->ressource->getId().", ";
			$sql .= "coeff = $this->coeff ";
			$sql .= "WHERE coeffRessourceId = $this->id";
		}
		DB::execRequest($sql);
		if ( $first ) $this->id = DB::lastId();
	}

	/**
	 * Get the value of coeff
	 */ 
	public function getCoeff()
	{
		return $this->coeff;
	}

	/**
	 * Set the value of coeff
	 *
	 * @return  self
	 */ 
	public function setCoeff($coeff)
	{
		$this->coeff = $coeff;

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
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}
}