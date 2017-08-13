<?php

	class model{

		public $id;
		public $data;

		public function __construct(){
		}

/* GLOBAL */
		function selectAll($data){
			global $mysqli;
			$query = $mysqli->query("SELECT * FROM $data");
			return $query;
		}

		function delete($id, $data){
			global $mysqli;
			$data .= '_id';
			$query = $mysqli->query("DELETE FROM $data WHERE $data='$id' ");
			return $this->execute();
		}


		function select($id, $data){
			global $mysqli;
			$data_id = $data . "_id";
		    $query = $mysqli->prepare("SELECT * FROM $data WHERE $data_id=? ");
		    $query->bind_param('i', $id);
		    $query->execute();
			return $query;
		}
		function selectLimit($data, $start, $limit){
			global $mysqli;
			$query = $mysqli->query("SELECT * FROM $data LIMIT $start, $limit");
			return $query;
		}

/* USER SETTING */
		function insertUser($name, $email, $pass){
			global $mysqli;
			$query = $mysqli->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?) ");
			$query->bind_param("sss", $name, $email, $pass);
			$query->execute();
		}

		function updateUser($name, $email, $pass, $level, $picture, $id){
			global $mysqli;
			$query = $mysqli->prepare("UPDATE user SET name=?, email=?, password=?, level=?, picture=? WHERE user_id=?");
			$query->bind_param("sssisi", $name, $email, $pass, $level, $picture, $id);
			$query->execute();
		}

		function __destruct(){
		}
	}

?>