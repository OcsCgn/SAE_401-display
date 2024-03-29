<?php

namespace src\model;

use PDO;
use PDOException;

class DB
{

	private static ?PDO $db = null;

	public static function connect()
	{
		$host = 'localhost';
		$dbname = 'postgres';
		$user = 'invit';
		$password = 'invit_mdp';

		try {
			$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$db = $pdo;
			error_log("Connexion à la base de données établie avec succès.");
		} catch (PDOException $e) {
			error_log("Erreur de connexion à la base de données : " . $e->getMessage());
		}
	}

	public static function query($req)
	{
		$stm = self::$db->query($req);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function execRequest($req)
	{
		return self::$db->exec($req);
	}

	public static function lastId()
	{
		return self::$db->lastInsertId();
	}

	public static function getDb()
	{
		return self::$db;
	}
}
