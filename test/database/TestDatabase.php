<?php

use PHPUnit\Framework\TestCase;
use src\model\DB;
use src\model\object\Bin;
use src\model\object\CoeffRessource;
use src\model\object\Etudiant;
use src\model\object\EtudiantSemestre;
use src\model\object\Note;
use src\model\object\Ressource;
use src\model\object\Semestre;

class TestDatabase extends TestCase{

	public function test_object(){

		DB::connect();
		$etudiant = Etudiant::newEtudiant(123, 143, 10, "M.", "Bernouy", "Matthias", "A", "STHR", "Specialite", "Admission", "RegAdmin");
		$semestre = Semestre::newSemestre("S1");
		$bin = Bin::newBin("NewBin", $semestre);
		$ressource = Ressource::newRessource("Ress1", $bin, 0);
		$etuSemestre = EtudiantSemestre::newEtudiantSemestre($semestre, $etudiant, 10, 20, 5, 1.25);
		$coeffRessource = CoeffRessource::newCoeffRessource($bin, $ressource, 20);
		$note = Note::newNote(16, $etudiant, $ressource);

	}
	
	

}
