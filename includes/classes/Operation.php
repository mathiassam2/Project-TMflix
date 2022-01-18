<?php 
require_once("AdminDatabase.php");
require_once("component.php");

$con = Createdb();

//create button click
if(isset($_POST['create'])){
	createData();
}

if(isset($_POST['update'])){
	updateData();
}

if(isset($_POST['delete'])){
	deleteRecord();
}

if(isset($_POST['createVideo'])){
	createDataVideo();
}

if(isset($_POST['updateVideo'])){
	updateDataVideo();
}

if(isset($_POST['deleteVideo'])){
	deleteRecordVideo();
}

if(isset($_POST['next'])){
	header("Location: pagination.php");
}

if(isset($_POST['back'])){
	header("Location: adminPage.php");
}

function createDataVideo(){
	$con = $GLOBALS['con'];
	$title = textBoxValue("title");
	$description = textBoxValue("description");
	$filePath = "entities/videos/";
	$filePath .= textBoxValue("filePath");
	$isMovie = (int)textBoxValue("isMovie");
	$releaseDate = textBoxValue("releaseDate");
	$duration = textBoxValue("duration");
	$seriesId = textBoxValue("seriesVideoId");
	$season = textBoxValue("season");
	$episode = textBoxValue("episode");

	// echo "title:$title, desc:$description, path:$filePath, ismovie:$isMovie, release:$releaseDate, duration:$duration, seriesid:$seriesId, season:$season, episode:$episode";
	if($title && $description && $filePath && is_numeric($isMovie) && $releaseDate && $duration && $seriesId && $season && $episode){
		$sql = "INSERT INTO videos(title, description, filePath, isMovie, releaseDate, duration, season, episode, entityId)
				VALUES ('$title', '$description', '$filePath', '$isMovie', '$releaseDate', '$duration', '$season', '$episode', '$seriesId');";

		$testsql = mysqli_query($GLOBALS['con'], $sql);

		if($testsql){
			textNode("success", "Records successfully inserted!");
		}
		else{
			textNode("error", "Error inserting data");
		}
	}
	else{
		textNode("error", "Please provide all the data in the text box");
	}
}

function updateDataVideo(){
	$videoId = textBoxValue("videoid");
	$title = textBoxValue("title");
	$description = textBoxValue("description");
	$filePath = textBoxValue("filePath");
	$isMovie = (int)textBoxValue("isMovie");
	$releaseDate = textBoxValue("releaseDate");
	$duration = textBoxValue("duration");
	$seriesId = textBoxValue("seriesVideoId");
	$season = textBoxValue("season");
	$episode = textBoxValue("episode");

	if($title && $description && $filePath && is_numeric($isMovie) && $releaseDate && $duration && $seriesId && $season && $episode){
		$sql = "
			UPDATE videos SET title = '$title',
			description = '$description',
			filePath = '$filePath',
			isMovie = '$isMovie',
			releaseDate = '$releaseDate',
			duration = '$duration',
			entityId = '$seriesId',
			season = '$season',
			episode = '$episode'
			WHERE id='$videoId'
		";

		if(mysqli_query($GLOBALS['con'], $sql)){
			textNode("success", "Data successfully updated");
		}
		else{
			textNode("error", "Unable to update data");
		}
	}
	else{
		textNode("error", "Select data using edit icon");
	}
}









function createData(){
	$con = $GLOBALS['con'];
	$categoryId = textBoxValue("categoryId");
	$seriesName = textBoxValue("tvSeriesName");
	$thumbnailDirectory = "entities/thumbnails/";
	$thumbnailDirectory .= textBoxValue("thumbnailDirectory");
	$previewDirectory = "entities/previews/";
	$previewDirectory .= textBoxValue("previewDirectory");

	$director = textBoxValue("director");
	$actor = textBoxValue("actor");
	// $globalDirector = $GLOBALS['$director'];
	// $globalActor = $GLOBALS['$actor'];


	if($categoryId && $seriesName && $thumbnailDirectory && $previewDirectory && $director && $actor){
		$sql = "INSERT INTO entities(name, thumbnail, preview, categoryId)
				VALUES ('$seriesName', '$thumbnailDirectory', '$previewDirectory', '$categoryId');";

		$testsql = mysqli_query($GLOBALS['con'], $sql);
		

		// check main table/entity
		$sqlCheckDirector = "SELECT * FROM director WHERE name = '$director'";
		$resultDirector = mysqli_query($GLOBALS['con'], $sqlCheckDirector);

		//masalah

		$testsql1 = true;
		if(mysqli_num_rows($resultDirector) == 0){
			$sql1 = "INSERT INTO director(name)
					VALUES ('$director');";

			$testsql1 = mysqli_query($GLOBALS['con'], $sql1);
					
		}
		
		$sqlCheckActor = "SELECT * FROM actors WHERE name = '$actor'";
		$resultActor = mysqli_query($GLOBALS['con'], $sqlCheckActor);

		$testsql2 = true;
		if(mysqli_num_rows($resultActor) == 0){
			
			$sql2 = "INSERT INTO actors(name)
					VALUES ('$actor')";
			$testsql2 = mysqli_query($GLOBALS['con'], $sql2);
					
		}


		
		//check composite entity
		$seriesId = setIdAgain();
		$sqlCheckFilmDirector = "SELECT * FROM filmdirector
								INNER JOIN entities ON filmdirector.seriesID = entities.id
								INNER JOIN director ON filmdirector.directorID = director.id
								WHERE entities.id = '$seriesId'
								AND director.name = '$director'";
		$resultFilmDirector = mysqli_query($GLOBALS['con'], $sqlCheckFilmDirector);
		
		if(mysqli_num_rows($resultFilmDirector) == 0){
			$sqlDirector = "SELECT id FROM director WHERE name='$director'";
			$resultIdDirector = mysqli_query($GLOBALS['con'], $sqlDirector);

			if(mysqli_query($GLOBALS['con'], $sqlDirector)){
				if($resultIdDirector){
					while($row = mysqli_fetch_assoc($resultIdDirector)){
						$sqlDirector = $row['id'];
					}
				}

				$sql3 = "INSERT INTO filmdirector(seriesID, directorID)
					VALUES ('$seriesId', '$sqlDirector');";

				$testsql3 = mysqli_query($GLOBALS['con'], $sql3);
			}		
		}


		$seriesId = setIdAgain();
		$sqlCheckFilmActor = "SELECT * FROM filmactors
								INNER JOIN entities ON filmactors.seriesId = entities.id
								INNER JOIN actors ON filmactors.actorId = actors.id
								WHERE entities.id = '$seriesId'
								AND actors.name = '$actor'";
		$resultFilmActor = mysqli_query($GLOBALS['con'], $sqlCheckFilmActor);
		
		if(mysqli_num_rows($resultFilmActor) == 0){
			$sqlActor = "SELECT id FROM actors WHERE name='$actor'";
			$resultIdActor = mysqli_query($GLOBALS['con'], $sqlActor);

			if(mysqli_query($GLOBALS['con'], $sqlActor)){
				if($resultIdActor){
					while($row = mysqli_fetch_assoc($resultIdActor)){
						$sqlActor = $row['id'];
					}
				}

				$sql4 = "INSERT INTO filmactors(seriesId, actorId)
					VALUES ('$seriesId', '$sqlActor');";

				$testsql4 = mysqli_query($GLOBALS['con'], $sql4);
			}		
		}


		//after everything is executed
		if($testsql && $testsql1 && $testsql2 && $testsql3 && $testsql4){
			textNode("success", "Records successfully inserted!");
		}
		else{
			textNode("error", "Error inserting data");
		}
	}
	else{
		textNode("error", "Please provide all the data in the text box");
	}
}

function textBoxValue($value){
	$textBox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
	if(empty($textBox)){
		return false;
	}
	else{
		return $textBox;
	}
}

function textNode($classname, $msg){
	$element = "<h6 class='$classname'>$msg</h6>";
	echo $element;
}

function getData(){
	$sql = "SELECT * FROM entities";

	$result = mysqli_query($GLOBALS['con'], $sql);

	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}

function getDataVideo(){
	$sql = "SELECT * FROM videos";

	$result = mysqli_query($GLOBALS['con'], $sql);

	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}

function getDataDirector(){
	$sql = "SELECT * FROM director";

	$result = mysqli_query($GLOBALS['con'], $sql);

	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}

function getDataActor(){
	$sql = "SELECT * FROM actors";

	$result = mysqli_query($GLOBALS['con'], $sql);

	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}

function updateData(){
	$seriesId = textBoxValue("seriesId");
	$categoryId = textBoxValue("categoryId");
	$tvSeriesName = textBoxValue("tvSeriesName");
	$thumbnail = textBoxValue("thumbnailDirectory");
	$preview = textBoxValue("previewDirectory");

	//new
	$director = textBoxValue("director");
	$actor = textBoxValue("actor");

	if($categoryId && $tvSeriesName && $thumbnail && $preview){
		$sql = "
			UPDATE entities SET name = '$tvSeriesName',
			thumbnail = '$thumbnail',
			preview = '$preview',
			categoryId = '$categoryId'
			WHERE id='$seriesId'
		";

		////////////////////////////
		
		//check if director entered exist, if not, insert new director into director table
		$sqlCheckFilmDirector = "SELECT * FROM filmdirector
								INNER JOIN entities ON filmdirector.seriesID = entities.id
								INNER JOIN director ON filmdirector.directorID = director.id
								WHERE entities.id = '$seriesId'
								AND director.name = '$director'";
		$resultFilmDirector = mysqli_query($GLOBALS['con'], $sqlCheckFilmDirector);
		
		if(mysqli_num_rows($resultFilmDirector) == 0){

			$sqltest = "INSERT INTO director(name)
						VALUES ('$director');";

			$testsqltest = mysqli_query($GLOBALS['con'], $sqltest);

			if($testsqltest){
				$sqlDirector = "SELECT id FROM director WHERE name='$director'";
				$resultIdDirector = mysqli_query($GLOBALS['con'], $sqlDirector);

				if(mysqli_query($GLOBALS['con'], $sqlDirector)){
					if($resultIdDirector){
						while($row = mysqli_fetch_assoc($resultIdDirector)){
							$sqlDirector = $row['id'];
						}
					}

					$sql3 = "
							INSERT INTO filmdirector(seriesID, directorID)
							VALUES ('$seriesId', '$sqlDirector');
							";

					$testsql3 = mysqli_query($GLOBALS['con'], $sql3);
				}
			}
					
		}

		//check if actor entered exist, if not, insert new actor into actor table
		$sqlCheckFilmActor = "SELECT * FROM filmactors
								INNER JOIN entities ON filmactors.seriesId = entities.id
								INNER JOIN actors ON filmactors.actorId = actors.id
								WHERE entities.id = '$seriesId'
								AND actors.name = '$actor'";
		$resultFilmActor = mysqli_query($GLOBALS['con'], $sqlCheckFilmActor);
		
		if(mysqli_num_rows($resultFilmActor) == 0){

			$sqltest = "INSERT INTO actors(name)
						VALUES ('$actor');";

			$testsqltest = mysqli_query($GLOBALS['con'], $sqltest);

			$sqlActor = "SELECT id FROM actors WHERE name='$actor'";
			$resultIdActor = mysqli_query($GLOBALS['con'], $sqlActor);

			if(mysqli_query($GLOBALS['con'], $sqlActor)){
				if($resultIdActor){
					while($row = mysqli_fetch_assoc($resultIdActor)){
						$sqlActor = $row['id'];
					}
				}

				$sql4 = "INSERT INTO filmactors(seriesId, actorId)
					VALUES ('$seriesId', '$sqlActor');";

				$testsql4 = mysqli_query($GLOBALS['con'], $sql4);
			}		
		}

		///////////////////////////

		if(mysqli_query($GLOBALS['con'], $sql)){
			textNode("success", "Data successfully updated");
		}
		else{
			textNode("error", "Unable to update data");
		}
	}
	else{
		textNode("error", "Select data using edit icon");
	}
}

function deleteRecord(){
	$seriesId = (int)textBoxValue("seriesId");


	/////////////////
	$sqlActor = "SELECT id FROM filmrating WHERE seriesID='$seriesId'";
	$resultIdActor = mysqli_query($GLOBALS['con'], $sqlActor);

	if(mysqli_query($GLOBALS['con'], $sqlActor)){
		if($resultIdActor){
			while($row = mysqli_fetch_assoc($resultIdActor)){
				$sqlActor = $row['id'];
			}
		}

		$sql4 = "DELETE FROM filmrating WHERE id='$sqlActor'";

		$test2 = mysqli_query($GLOBALS['con'], $sql4);
	}
	/////////////////

	$sql = "DELETE FROM entities WHERE id='$seriesId'";
	

	$test1 = mysqli_query($GLOBALS['con'], $sql);
	

	if($test1 && $test2){
		textNode("success", "Data successfully deleted");
	}
	else{
		textNode("error", "Unable to delete data"); 
	}
}

function setId(){
	$getId = getData();
	$id = 0;

	if($getId){
		while($row = mysqli_fetch_assoc($getId)){
			$id = $row['id'];
		}
	}
	return ($id + 1);
}

function setIdVideo(){
	$getId = getDataVideo();
	$id = 0;

	if($getId){
		while($row = mysqli_fetch_assoc($getId)){
			$id = $row['id'];
		}
	}
	return ($id + 1);
}

function setIdAgain(){
	$getId = getData();
	$id = 0;

	if($getId){
		while($row = mysqli_fetch_assoc($getId)){
			$id = $row['id'];
		}
	}
	return $id;
}

function setIdDirector($directorName){

}

function setIdActor(){
	//same as setIdDirector
}



?>