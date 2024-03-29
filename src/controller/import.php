<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

function import()
{
	if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['excelFile'])) {
		$file = $_FILES['excelFile'];

		if ($file['error'] === UPLOAD_ERR_OK) {
			$tmpFilePath = $file['tmp_name'];

			$fileName = $file['name'];
			echo "Nom du fichier téléchargé : $fileName";

			require_once '../vendor/autoload.php';

			$spreadsheet = IOFactory::load($tmpFilePath);

			$worksheet = $spreadsheet->getActiveSheet();

			$data = [];
			foreach ($worksheet->getRowIterator() as $row) {
				$rowData = [];
				foreach ($row->getCellIterator() as $cell) {
					$rowData[] = $cell->getValue();
				}
				$data[] = $rowData;
			}

			if (strpos($fileName, 'moyennes') !== false) {
				treatmentMoyennes($fileName, $data);
			}
			elseif (strpos($fileName, 'jury') !== false) {
				treatmentJury($fileName, $data);
			}
			else {
				echo "Le fichier ne contient ni 'moyennes' ni 'jury'. Retour à l'importation.";
				header("Location: /import");
			}
		} else {
			echo "Une erreur s'est produite lors du téléchargement du fichier.";
		}
	}
}

function treatmentMoyennes($fileName, $fileContent)
{

}

function treatmentJury($fileName, $fileContent)
{
	$extractedData = [];

	foreach ($fileContent as $line) {
		$etudid = $line[0];
		$codenip = $line[1];
		$nom = $line[3];
		$prenom = $line[6];

		$extractedData[] = [
			'etudid' => $etudid,
			'codenip' => $codenip,
			'nom' => $nom,
			'prenom' => $prenom
		];
	}

	echo '<h2>Données extraites du fichier : ' . htmlspecialchars($fileName) . '</h2>';
	echo '<table class="table">';
	echo '<thead><tr><th>ÉtudID</th><th>CodeNIP</th><th>Nom</th><th>Prénom</th></tr></thead>';
	echo '<tbody>';
	foreach ($extractedData as $row) {
		echo '<tr>';
		echo '<td>' . htmlspecialchars($row['etudid']) . '</td>';
		echo '<td>' . htmlspecialchars($row['codenip']) . '</td>';
		echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
		echo '<td>' . htmlspecialchars($row['prenom']) . '</td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}
