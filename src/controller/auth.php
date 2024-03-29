<?php

use src\model\DB;

function auth()
{
	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';

	$pdo = DB::getDb();

	try {
		$query = "SELECT * FROM utilisateur WHERE identifiant = :username AND mot_de_passe = :password";
		$statement = $pdo->prepare($query);
		$statement->execute(['username' => $username, 'password' => $password]);
		$row = $statement->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			$_SESSION['user_id'] = 1;

			if ($row['statut'] === 'admin') {
				$_SESSION['user_status'] = 1;
			} elseif ($row['statut'] === 'invité') {
				$_SESSION['user_status'] = 0;
			}

			header("Location: /display");
		} else {
			error_log("Aucun utilisateur trouvé");
		}
	} catch (PDOException $e) {
		error_log($e->getMessage());
		header('Location: /?error=1');
		exit;
	}
}