<?php
use src\model\object\Etudiant;
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../src/model/object/Etudiant.php';
require '../src/model/database.php';

$tab = array();
if(isset($_POST['selectedOption'])){
	$attribut = $_POST['selectedOption'];
}


if($attribut === "Alphabétique"){
	$sql = "Select INTO Etudiant (etudiantId, codeNip, rang, civilite, nom, prenom, cursus, typeAdmission) ORDER BY nom,prenom;";
}
if($attribut === "Rang décroissant"){
	$sql = "Select INTO Etudiant (etudiantId, codeNip, rang, civilite, nom, prenom, cursus, typeAdmission) ORDER BY rang DESC;";
}
else{
	$sql = "Select INTO Etudiant (etudiantId, codeNip, rang, civilite, nom, prenom, cursus, typeAdmission) ORDER BY"+ $attribut +";";

}

$sql->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Etudiant); 
$tab = DB::execRequest($sql);
$tuple = $sql->fetch(); 
if ($tuple) {
		while ($tuple != false) {
			$tab[]=$tuple;
			$tuple = $sql->fetch();        
	} 		           	     
}   

?>