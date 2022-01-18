<?php 
class Video{
	private $con, $sqlData, $entity, $sqlData2, $entity2, $actorString;

	public function __construct($con, $input){
		$actorString = "Actors: ";
		$this->con = $con;

		if(is_array($input)){
			$this->sqlData = $input;//input is video id
			$this->sqlData2 = $input;
		}
		else{
			$query = $this->con->prepare("SELECT * FROM videos WHERE id=:id");
			$query->bindValue(":id", $input);
			$query->execute();
			$this->sqlData = $query->fetch(PDO::FETCH_ASSOC);

			$query2 = $this->con->prepare("SELECT * FROM videos WHERE id=:id");
			$query2->bindValue(":id", $input);
			$query2->execute();
			$this->sqlData2 = $query2->fetch(PDO::FETCH_ASSOC);
		}

		$this->entity = new Entity($con, $this->sqlData["entityId"]);
		$this->entity2 = new Entity($con, $this->sqlData2["entityId"]);
	}

	public function getActorList(){
		$actorList = "";
		$entity = $this->getEntityId();
		

		$sql = "SELECT actors.name FROM actors
				INNER JOIN filmactors
				ON actors.id = filmactors.actorId
				INNER JOIN entities
				ON entities.id = filmactors.seriesId
				WHERE entities.id = $entity
				LIMIT 5";


		$result = $this->con->query($sql);
		$row = "";
		if ($result->rowCount() > 0) {
			$actorList = "Staring ";
			$max = $result->rowCount();
			$int = 1;
		  // output data of each row
		  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    $actorList .= $row["name"];
		    
		    if($int+1 <= $max){
		    	$actorList .= ", ";
		    	$int++;
		    }
		  }
		}

		return "$actorList";
	}

	public function getRating(){
		$rating = "Rotten Tomatoes: Not Available";
		$entity = $this->getEntityId();
		

		$sql = "SELECT rating FROM filmrating
				INNER JOIN entities
				ON filmrating.seriesID = entities.id
				WHERE entities.id = $entity
				LIMIT 1";


		$result = $this->con->query($sql);
		if ($result->rowCount() > 0) {
		  // output data of each row
			$rating = "Rotten Tomatoes: ";
		  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    $rating .= $row["rating"];
		    $rating .= "%";
		  }
		}

		return "$rating";
	}

	public function getAward(){
		$entity = $this->getEntityId();
		$award = "Awards: None";

		$sql = "SELECT awardName FROM award
				INNER JOIN filmaward
				ON award.id = filmaward.awardID
				where filmaward.seriesID = $entity
				LIMIT 3";


		$result = $this->con->query($sql);
		$row = "";
		if ($result->rowCount() > 0) {
			$award = "Awards: ";
			$max = $result->rowCount();
			$int = 1;
		  // output data of each row
		  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    $award .= $row["awardName"];
		    
		    if($int+1 <= $max){
		    	$award .= ", ";
		    	$int++;
		    }
		  }
		}

		return "$award";
	}

	public function getDirector(){
		$actorList = "";
		$entity = $this->getEntityId();
		

		$sql = "SELECT director.name FROM director
				INNER JOIN filmdirector
				ON director.id = filmdirector.directorID
				INNER JOIN entities
				ON entities.id = filmdirector.seriesID
				WHERE entities.id = $entity
				LIMIT 2";


		$result = $this->con->query($sql);
		$row = "";
		if ($result->rowCount() > 0) {
			$actorList = "Directed by ";
			$max = $result->rowCount();
			$int = 1;
		  // output data of each row
		  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    $actorList .= $row["name"];
		    
		    if($int+1 <= $max){
		    	$actorList .= ", ";
		    	$int++;
		    }
		  }
		}

		return "$actorList";
	}

	public function getSeasonAndEpisode(){
		if($this->isMovie()){
			return;
		}

		$season = $this->getSeasonNumber();
		$episode = $this->getEpisodeNumber();

		return "Season $season, Episode $episode";
	}

	public function getId(){
		return $this->sqlData["id"];
	}

	public function getTitle(){
		return $this->sqlData["title"];
	}

	public function getDescription(){
		return $this->sqlData["description"];
	}

	public function getFilePath(){
		return $this->sqlData["filePath"];
	}

	public function getThumbnail(){
		return $this->entity->getThumbnail();
	}

	public function getEpisodeNumber(){
		return $this->sqlData["episode"];
	}

	public function getSeasonNumber(){
		return $this->sqlData["season"];
	}

	public function getEntityId(){
		return $this->sqlData["entityId"];
	}

	public function incrementViews(){
		$query = $this->con->prepare("UPDATE videos SET views=views+1 WHERE id=:id");
		$query->bindValue(":id", $this->getId());
		$query->execute();
	}

	

	public function isMovie(){
		return $this->sqlData["isMovie"] == 1;
	}

	public function isInProgress($username){
		$query = $this->con->prepare("SELECT * FROM videoprogress
									WHERE videoId=:videoId AND username=:username");

		$query->bindValue(":videoId", $this->getId());
		$query->bindValue(":username", $username);

		$query->execute();

		return $query->rowCount() != 0;
	}

	public function hasSeen($username){
		$query = $this->con->prepare("SELECT * FROM videoprogress
									WHERE videoId=:videoId AND username=:username
									AND finished=1");

		$query->bindValue(":videoId", $this->getId());
		$query->bindValue(":username", $username);

		$query->execute();

		return $query->rowCount() != 0;
	}
}
?>