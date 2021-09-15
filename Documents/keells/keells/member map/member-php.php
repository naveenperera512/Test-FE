<?php 
	
	class keels	{
		private $conn;
		private $tableName = "farmerupdates";
		private $id;
		private $hname;
		private $description;
		private $quantity;
		private $harvestowner;
		private $lat;
		private $lng;
		private $image;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setHname($hname) { $this->hname = $hname; }
		function getHname() { return $this->hname; }
		function setDescription($description) { $this->description = $description; }
		function getDescription() { return $this->description; }
		function setQuantity($quantity) { $this->quantity = $quantity; }
		function getQuantity() { return $this->quantity; }
		function setHarvestowner($harvestowner) { $this->harvestowner = $harvestowner; }
		function getHarvestowner() { return $this->harvestowner; }
		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }
		function setImage($image) { $this->image = $image; }
		function getImage() { return $this->image; }




		public function __construct() {
			require_once('db/DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

		public function getCollegesBlankLatLng() {
			$sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllColleges() {
			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updateCollegesWithLatLng() {
			$sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat', $this->lat);
			$stmt->bindParam(':lng', $this->lng);
			$stmt->bindParam(':id', $this->id);
			if($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		

		}
	}

?>