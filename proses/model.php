<?php
	include('pdo.php');

	class model extends database{

		public $db;
		public function __construct(){	
			$pdo = Database::instance();
			$this->db = $pdo->getInstance();
		}

/* GLOBAL */
function selectJoinName($tables, $data){
	$set = array();
	foreach ($tables as $key => $value) {
		$table_id = $value . '_id';
		$set[] = ' LEFT JOIN ' . $value . ' ON ' . $data . '.' . $table_id . ' = ' . $value . '.' . $table_id;
	}

	$set = implode(' ', $set);
	$view = array();
	foreach ($tables as $key => $value) {
		$view[] = $value . '.' . $value . '_name';
	}
	$view = $data . '.*, ' . implode(', ', $view);

	$query = $this->db->query("SELECT $view FROM $data $set");
	return $query;
}
		function selectAll($data){
			$query = $this->db->prepare("SELECT * FROM $data");
			$query->execute();
			return $query;
		}

		function select($data, $id){
			$data_id = $data . "_id";
			
		    $query = $this->db->prepare("SELECT * FROM $data WHERE $data_id=$id ");

		    // $query->bindParam(':id', $id, PDO::PARAM_INT);
		    $query->execute();
			return $query;
		}

		function selectLimit($data, $start, $limit){
			$query = $this->db->prepare("SELECT * FROM $data LIMIT :start, :limit");

			$query->bindParam(':start', $start, PDO::PARAM_INT);
			$query->bindParam(':limit', $limit, PDO::PARAM_INT);

			$query->execute();
			return $query;
		}

		function insert($data, $array){
			$placeholders 	= implode(',', array_fill(0, count($array), '?'));
			$sql 			= implode(", ", array_keys($array));
			$values  		= array_values($array);

			$query = $this->db->prepare("INSERT INTO $data ($sql) VALUES ($placeholders) ");

			$query->execute($values);
			return $query;
		}
		
		function delete($data, $id){
			$data_id = $data . "_id";

			$query = $this->db->prepare("DELETE FROM $data WHERE $data_id=$id ");

		    // $query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->execute();
			return $query;
		}

/* USER SETTING */
		// function insertUser($name, $email, $pass){
		// 	$query = $this->db->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?) ");
		// 	$query->execute(array($name, $email, $pass));
		// }

		function update($data, $id, $array){
			$data_id 		= $data . "_id";
			$placeholders 	= $array;
			$values  		= array_values($array);
			$set 			= array();

			foreach ($placeholders as $key=>$value) {
				$set[] = $key . "=?";
			}
			$placeholders = implode(', ' , array_values($set));

			$query = $this->db->prepare("UPDATE $data SET $placeholders WHERE $data_id=$id ");

		    // $query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->execute($values);
			return $query;
		}

		//prepared staement mysqli
		// function updateUser($name, $email, $pass, $level, $picture, $id){
		// 	$db = database::getInstance();
		// 	$query = $db->prepare("UPDATE user SET name=?, email=?, password=?, level=?, picture=? WHERE user_id=?");
		// 	$query->bind_param("sssisi", $name, $email, $pass, $level, $picture, $id);
		// 	$query->execute();
		// }

		

		function __destruct(){
		}
	}

?>