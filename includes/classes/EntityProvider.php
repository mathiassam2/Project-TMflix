<?php 
class EntityProvider{

	public static function getEntities($con, $categoryId, $limit){

		$sql = "SELECT * FROM entities ";

		if($categoryId != null){
			$sql .= "WHERE categoryId=:categoryId ";
		}

		$sql .= "ORDER BY RAND() LIMIT :limit";

		$query = $con->prepare($sql);

		if($categoryId != null){
			$query->bindValue(":categoryId", $categoryId);
		}

		$query->bindValue(":limit", $limit, PDO::PARAM_INT);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($con, $row);
		}

		return $result;

	}

	public static function getTrending($con){

		$sql = "SELECT SUM(views), entityId, entities.*
				FROM videos
				INNER JOIN entities
				ON videos.entityId = entities.id
				GROUP BY entityId
				ORDER BY SUM(views) DESC LIMIT 5";

		$query = $con->prepare($sql);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($con, $row);
		}

		return $result;
	}

	public static function getTVShowEntities($con, $categoryId, $limit){

		$sql = "SELECT DISTINCT(entities.id) FROM `entities`
				INNER JOIN videos
				ON entities.id = videos.entityId
				WHERE videos.isMovie = 0 ";

		if($categoryId != null){
			$sql .= "AND categoryId=:categoryId ";
		}

		$sql .= "ORDER BY RAND() LIMIT :limit";

		$query = $con->prepare($sql);

		if($categoryId != null){
			$query->bindValue(":categoryId", $categoryId);
		}

		$query->bindValue(":limit", $limit, PDO::PARAM_INT);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($con, $row["id"]);
		}

		return $result;

	}

	public static function getMoviesEntities($con, $categoryId, $limit){

		$sql = "SELECT DISTINCT(entities.id) FROM `entities`
				INNER JOIN videos
				ON entities.id = videos.entityId
				WHERE videos.isMovie = 1 ";

		if($categoryId != null){
			$sql .= "AND categoryId=:categoryId ";
		}

		$sql .= "ORDER BY RAND() LIMIT :limit";

		$query = $con->prepare($sql);

		if($categoryId != null){
			$query->bindValue(":categoryId", $categoryId);
		}

		$query->bindValue(":limit", $limit, PDO::PARAM_INT);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($con, $row["id"]);
		}

		return $result;

	}

	public static function getSearchEntities($con, $term){

		//original search query
		// $sql = "SELECT * FROM entities 
		// 		WHERE name LIKE CONCAT('%', :term, '%') 
		// 		LIMIT 30";

		$sql = "SELECT *
                FROM actors
                LEFT JOIN filmactors
                ON actors.id = filmactors.actorId
                LEFT JOIN entities
                ON filmactors.seriesId = entities.id
                WHERE actors.name
                LIKE CONCAT('%', :term, '%')
                OR entities.name
                LIKE CONCAT('%', :term, '%')
                GROUP BY entities.id
                LIMIT 30";

		$query = $con->prepare($sql);

		$query->bindValue(":term", $term);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($con, $row);
		}

		return $result;

	}

	public static function getAdminEntities($con, $term){

		// $sql = "SELECT * FROM entities 
		// 		WHERE name LIKE CONCAT('%', :term, '%') 
		// 		LIMIT 30";

		$sql = "SELECT * FROM entities";

		$query = $con->prepare($sql);

		$query->bindValue(":term", $term);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($con, $row);
		}

		return $result;

	}

}
?>