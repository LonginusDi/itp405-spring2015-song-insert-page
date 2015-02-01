<?php
	require_once __DIR__ . '/ArtistQuery.php';
	$aQuery = new ArtistQuery();
	$artists = $aQuery->getAll();

	require_once __DIR__ . '/GenreQuery.php';
	$gQuery = new GenreQuery();
	$genres = $gQuery->getAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Song Insert Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action = "add-song.php" method="get" >
		<header>
    		<h2>Song Insert Page</h2>
  		</header>

		<div>Title: &nbsp;&nbsp;&nbsp;<input type="text" name = "title"></div>
		<div>Artist: &nbsp;
		<select name="artist">
			<?php foreach($artists as $artist) : ?>
				<option value= "<?php echo $artist->id ?>">
					<?php echo $artist->artist_name ?>
				</option>
			<?php endforeach ?>
		</select></div>
		<div>Genre: &nbsp;
		<select name="genre">
			<?php foreach($genres as $genre) : ?>
				<option value= "<?php echo $genre->id ?>">
					<?php echo $genre->genre ?>
				</option>
			<?php endforeach ?>
		</select></div>
		<div>Price: &nbsp;&nbsp; <input type="text" name = "price"></div>
		<div><input type="submit" value="Search" name="submit"></div>
	</form>

<?php
	require_once __DIR__ . '/Song.php';
	$song = new Song();
	if(isset($_GET['submit'])){
		$title = $_GET['title'];
		$artist_id = $_GET['artist'];
		$genre_id = $_GET['genre'];
		$price = $_GET['price'];

		$song->setTitle($title);
		$song->setArtistId($artist_id);
		$song->setGenreId($genre_id);
		$song->setPrice($price);
		$song->save();
	}
?>
	<p>The song <?php echo $song->getTitle() ?> with an ID of <?php echo $song->getId() ?> was inserted successfully!</p>

</body>
</html>

