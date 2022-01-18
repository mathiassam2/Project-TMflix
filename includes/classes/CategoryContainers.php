<?php 
class CategoryContainers{

	private $con;
	private $username;
	private $check;

	public function __construct($con, $username){
		$this->con = $con;
		$this->username = $username;
		$this->check = false;
	}

	public function showAllCategories(){
		$query = $this->con->prepare("SELECT * FROM categories");
		$query->execute();

		$html = "<div class='previewCategories'>";

		$html .= $this->getTrendingHtml();

		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$html .= $this->getCategoryHtml($row, null, true, true);
		}

		return $html . "</div>";
	}

	public function showTVShowCategories(){
		$query = $this->con->prepare("SELECT * FROM categories");
		$query->execute();

		$html = "<div class='previewCategories'>
					<h1>TV Shows</h1>";

		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$html .= $this->getCategoryHtml($row, null, true, false);
		}

		return $html . "</div>";
	}

	public function showMovieCategories(){
		$query = $this->con->prepare("SELECT * FROM categories");
		$query->execute();

		$html = "<div class='previewCategories'>
					<h1>Movies</h1>";

		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$html .= $this->getCategoryHtml($row, null, false, true);
		}

		return $html . "</div>";
	}

	public function showCategory($categoryId, $title = null){
		$query = $this->con->prepare("SELECT * FROM categories WHERE id=:id");
		$query->bindValue(":id", $categoryId);
		$query->execute();

		$html = "<div class='previewCategories noScroll'>";

		

		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$html .= $this->getCategoryHtml($row, $title, true, true);
		}	

			

		return $html . "</div>";
	}

	private function getTrendingHtml(){

		$entitiesTrending = EntityProvider::getTrending($this->con);

		if(sizeof($entitiesTrending) == 0){
			return;
		}

		$entitiesTrendingHtml = "";
		$previewProvider = new PreviewProvider($this->con, $this->username);

		foreach($entitiesTrending as $entityTrending){
			$entitiesTrendingHtml .= $previewProvider->createEntityPreviewSquare($entityTrending);
		}

		return "<div class='category'>
	 					<h3>Top 5 trending</h3>
	 				<div class='entities'>
	 					$entitiesTrendingHtml
	 				</div>
	 			</div>";
	}

	private function getCategoryHtml($sqlData, $title, $tvShows, $movies){
		$categoryId = $sqlData["id"];
		$title = $title == null ? $sqlData["name"] : $title;

		if($tvShows && $movies){
			$entities = EntityProvider::getEntities($this->con, $categoryId, 30);
		}
		else if($tvShows){
			$entities = EntityProvider::getTVShowEntities($this->con, $categoryId, 30);
		}
		else{
			$entities = EntityProvider::getMoviesEntities($this->con, $categoryId, 30);
		}

		if(sizeof($entities) == 0){
			return;
		}

		$entitiesHtml = "";
		$previewProvider = new PreviewProvider($this->con, $this->username);

		foreach($entities as $entity){
			$entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
		}

		return "<div class='category'>
					<a href='category.php?id=$categoryId'>
						<h3>$title</h3>
					</a>

					<div class='entities'>
						$entitiesHtml
					</div>

				</div>";
	}
}
?>