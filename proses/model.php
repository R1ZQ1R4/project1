<?php
	include('pdo.php');

	class model extends database{

		public $db;
		public function __construct(){	
			$pdo = Database::instance();
			$this->db = $pdo->getInstance();
		}

/* GLOBAL */
		function selectJoinMultiLimit($tables, $data, $start, $limit){
			// $set = array();
			// $i = 0;
			// foreach ($tables as $key => $value) {
			// 	$set[] = $i++;
			// }
			// $view = $data . '.*, ' . implode(', ', $view);
			// $data = $data . $set;

			$query = $this->db->prepare("SELECT transaction.*, hotel_room.*, hotel.hotel_name, user.user_name
										 FROM transaction
										 LEFT JOIN user ON transaction.user_id = user.user_id
										 LEFT JOIN hotel_room ON transaction.hotel_room_id = hotel_room.hotel_room_id 
										 LEFT JOIN hotel ON hotel_room.hotel_id = hotel.hotel_id 
										 LIMIT :start, :limit"
										);

			$query->bindParam(':start', $start, PDO::PARAM_INT);
			$query->bindParam(':limit', $limit, PDO::PARAM_INT);
			$query->execute();
			return $query;
		}

		function selectJoinMultiLimit2($tables, $data, $start, $limit, $search, $status){
			if ( is_numeric($status) ){
				$what = "AND 	(transaction.status = $status)";
			}else{
				$what = '';
			}
			$search = "'%" . $search . "%'";

			$query = $this->db->prepare("SELECT transaction.*, hotel_room.*, hotel.hotel_name, user.user_name
										 FROM transaction
										 LEFT JOIN user ON transaction.user_id = user.user_id
										 LEFT JOIN hotel_room ON transaction.hotel_room_id = hotel_room.hotel_room_id 
										 LEFT JOIN hotel ON hotel_room.hotel_id = hotel.hotel_id
										 WHERE 
                                         (transaction.transaction_code LIKE $search
                                         OR user.user_name LIKE $search)
								 		$what
										 "
										);
			// $query->bindParam(':search', $search, PDO::PARAM_STR);
			// $query->bindParam(':start', $start, PDO::PARAM_INT);
			// $query->bindParam(':limit', $limit, PDO::PARAM_INT);
			$query->execute();
			// $row = $query->fetch(PDO::FETCH_OBJ);
			// die(print_r($row->transaction_code));
			// die(print_r($query));
			return $query;
		}

		function selectReport($date1, $date2, $status){

			if ( is_numeric($status) ){
				$what = "AND 	(transaction.status = $status)";
			}else{
				$what = '';
			}

			$query = $this->db->prepare("SELECT transaction.*, hotel_room.*, hotel.hotel_name
										 FROM transaction
										 LEFT JOIN hotel_room ON transaction.hotel_room_id = hotel_room.hotel_room_id 
										 LEFT JOIN hotel ON hotel_room.hotel_id = hotel.hotel_id
										 WHERE  (transaction.checkin BETWEEN ? AND ?)
										 $what"
										);

			$date1 = "'" .$date1. "'";
			$date1 = "'" .$date2. "'";
			$query->execute(array($date1, $date2));
			return $query;
		}

		function selectReportHotel($date1, $date2, $status){
			if ( is_numeric($status) ){
				$what = "AND 	(transaction.status = $status)";
			}else{
				$what = '';
			}

			$query = $this->db->prepare("SELECT transaction.checkin,
												hotel_room.hotel_room_id, 
												hotel.hotel_name, 
												hotel_room.room_name, 
        										COUNT(transaction.hotel_room_id) AS total_reserved, 
										        SUM(transaction.reserved) AS days_total,
										        SUM(transaction.transaction_pay) AS income
										 FROM transaction
										 LEFT JOIN hotel_room ON transaction.hotel_room_id = hotel_room.hotel_room_id
										 LEFT JOIN hotel ON hotel.hotel_id = hotel_room.hotel_room_id
										 WHERE (transaction.checkin BETWEEN ? AND ?)
										 $what
										 GROUP BY transaction.hotel_room_id"
										);

			$date1 = "'" .$date1. "'";
			$date1 = "'" .$date2. "'";
			$query->execute(array($date1, $date2));
			return $query;
		}

// ==================================================================== SELECT JOIN
function Join($tables, $data){
	$set = array();
	foreach ($tables as $key => $value) {
		$table_id = $value . '_id';
		$set[] = ' LEFT JOIN ' . $value . ' ON ' . $data . '.' . $table_id . ' = ' . $value . '.' . $table_id . ' ';
	}

	$set = implode(' ', $set);
	$view = array();
	foreach ($tables as $key => $value) {
		$view[] = $value . '.* ';
	}
	$view = $data . '.*, ' . implode(', ', $view);
	$data = $data . $set;
	return array('view' => $view, 'data' => $data);
}
function selectJoin($tables, $data, $id){
	$data_id = $data . '_id';
	$result = $this->Join($tables, $data);
	$view = $result['view'];		
	$data = $result['data'];		
    $query = $this->db->prepare("SELECT $view FROM $data WHERE $data_id=$id ");
    // die(print_r($query));
    // $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
	return $query;
}
function selectAllJoin($tables, $data){
	$result = $this->Join($tables, $data);
	$view = $result['view'];		
	$data = $result['data'];
	$query = $this->db->prepare("SELECT $view FROM $data");
	$query->execute();
	return $query;
}
function selectJoinLimit($tables, $data, $start, $limit){
	$result = $this->Join($tables, $data);
	$view = $result['view'];		
	$data = $result['data'];
	$query = $this->db->prepare("SELECT $view FROM $data LIMIT :start, :limit");
	$query->bindParam(':start', $start, PDO::PARAM_INT);
	$query->bindParam(':limit', $limit, PDO::PARAM_INT);
	$query->execute();
	return $query;
}

// =======================================================================================
		function hotel_room($data, $id){
			$query = $this->db->prepare("UPDATE transaction
										 LEFT JOIN hotel_room 
										 ON transaction.hotel_room_id = hotel_room.hotel_room_id 
										 SET hotel_room.room_amount = hotel_room.room_amount $data
										 WHERE transaction.transaction_id = ?

										");
			$query->execute(array($id));
			return $query;
		}

		function article($id){
			$query = $this->db->prepare("UPDATE article
										 SET article_view = article_view + 1
										 WHERE article_id = ?

										");
			$query->execute(array($id));
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

		function selectLimit2($data, $start, $limit){
			$data_id = $data . "_id";
			$query = $this->db->prepare("SELECT * FROM $data ORDER BY $data_id DESC LIMIT :start, :limit");
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