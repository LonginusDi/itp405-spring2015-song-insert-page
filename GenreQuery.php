<?php

require_once __DIR__ . '/database.php';

class GenreQuery extends Database {

	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$sql = "
			SELECT *
			FROM genres
			ORDER BY genre
		";
		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$genres = $statement->fetchAll(PDO::FETCH_OBJ);

		return $genres;
	}

}

?>