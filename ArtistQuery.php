<?php

require_once __DIR__ . '/database.php';

class ArtistQuery extends Database {

	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$sql = "
			SELECT *
			FROM artists
			ORDER BY artist_name
		";
		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$artists = $statement->fetchAll(PDO::FETCH_OBJ);

		return $artists;
	}

}

?>