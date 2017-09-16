<?php
	include_once("proses/model.php");

	class controller{

		public $model;
		public $data;
		public $sort;
		public $date;

		function __construct(){
			$this->model = new model();
			$this->data = @$_GET['control'];
			$this->sort = @$_GET['sort'];

			$this->date = new DateTime();
		}

		function sort(){
			if (isset($this->sort)) {
				$link = '&sort=' . $this->sort;
				return $link;
			}
		}

		// function refreshURL(){
		// 	header('Location:?page=admin' . $this->sort() . '&control='.$this->data);

		// }

		function refreshURL(){
			header('Location:' . $_SERVER["REQUEST_URI"]);

		}

		function limiter($data, $limit){
			$limit = $limit;
			$s = $this->sort;
			$m = $this->model;

			$sort 	= isset($s) ? (int)$s : 1;
			$start 	= ($sort > 1) ? ($sort * $limit) - $limit : 0;

			$total = $m->selectAll($this->data);
			$total = $total->rowCount();
			
			$pagination = ceil($total/$limit);

			$result = $m->selectLimit2($data, $start, $limit);

			return array('result' => $result, 'page' => $pagination);
			
		}

		function limiter2($tables, $data, $limit){
			$limit = $limit;
			$s = $this->sort;
			$m = $this->model;

			$sort 	= isset($s) ? (int)$s : 1;
			$start 	= ($sort > 1) ? ($sort * $limit) - $limit : 0;

			$total = $m->selectAll($data);
			$total2 = $total->rowCount();
			
			$pagination = ceil($total2/$limit);
			$result = $m->selectJoinLimit($tables, $data, $start, $limit);

			return array('result' => $total, 'page' => $pagination, 'join' => $result);
			
		}

		function limiter3($tables, $data, $limit){
			$limit = $limit;
			$s = $this->sort;
			$m = $this->model;

			$sort 	= isset($s) ? (int)$s : 1;
			$start 	= ($sort > 1) ? ($sort * $limit) - $limit : 0;

			$total = $m->selectAll($data);
			$total2 = $total->rowCount();
			
			$pagination = ceil($total2/$limit);
			$result = $m->selectJoinMultiLimit($tables, $data, $start, $limit);

			return array('result' => $total, 'page' => $pagination, 'join' => $result);
			
		}

		function limiter4($tables, $data, $limit, $search, $status){
			$limit = $limit;
			$s = $this->sort;
			$m = $this->model;

			$sort 	= isset($s) ? (int)$s : 1;
			$start 	= ($sort > 1) ? ($sort * $limit) - $limit : 0;

			$total = $m->selectAll($data);
			$total2 = $total->rowCount();
			
			$pagination = ceil($total2/$limit);
			$result = $m->selectJoinMultiLimit2($tables, $data, $start, $limit, $search, $status);

			// $row = $result->fetch(PDO::FETCH_OBJ);
			// die(print_r($row->transaction_code));

			return array('result' => $total, 'page' => $pagination, 'join' => $result);
			
		}

// ============================================================ ARTICLE

		function article(){
			$this->check_user_level();
			$tables = array('place', 'user', 'category');
			$view = $this->limiter2($tables, $this->data, 10);
			include_once("content/admin_article.php");
		}

		function insert_article(){
			$date = $this->date->format('Y-m-d');

			$array = array(
					'article_name' 		=> $_POST['name'],
					'article_content' 	=> $_POST['content'],
					'article_date'		=> $date,
					'article_picture'	=> $_FILES['picture']['name'],
					'place_id'		=> $_POST['place'],
					'user_id'		=> $_SESSION['id'],
					'category_id'	=> $_POST['category'],
					'article_view'		=> 0
				);

			// $check = $this->check_input($array);
			$this->upload();
			// die(print_r($check));
			$insert = $this->model->insert($this->data, $array);
			$this->refreshURL();
		}

		function update_article(){
			$date = $this->date->format('Y-m-d');

			$array = array(
					'article_name' 		=> $_POST['name'],
					'article_content' 	=> $_POST['content'],
					'article_date'		=> $date,
					'article_picture'	=> $_FILES['picture']['name'],
					'place_id'		=> $_POST['place'],
					'category_id'	=> $_POST['category'],
				);

			// die(print_r($array));

			$this->upload();

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->refreshURL();
		}

//  ========================================================= USER
		function user(){
			$this->check_user_level();
			// $query = $this->model->selectAll($this->data);
			// $view = $this->limiter($query, 10);
			$view = $this->limiter($this->data, 10);
			include_once("content/admin_user.php");
		}

		function insert_user(){
			$password = $this->compare($_POST['password'], $_POST['re_password']);
			// $name = $_POST['name'];
			// $email = $_POST['email'];
			// $pass = $_POST['password'];

			// $insert = $this->model->insertUser($name, $email, $pass);
			$array = array(
					'user_name' 		=> $_POST['name'],
					'email' 	=> $_POST['email'],
					'password' 	=> $password
				);

			$check = $this->check_input($array);

			// die(print_r($check));
			$insert = $this->model->insert($this->data, $check);
			$this->refreshURL();
		}


		// function update(){
		// 	$id = $_POST['id'];
		// 	$name = $_POST['name'];
		// 	$email = $_POST['email'];
		// 	$pass = $_POST['password'];
		// 	$picture = $_FILES['picture']['name'];
		// 	$level = $_POST['level'];

		// 	$this->upload();

		// 	$update = $this->model->updateUser($name, $email, $pass, $level, $picture, $id);

		// }

		function update_user(){
			$password = $this->compare($_POST['password'], $_POST['re_password']);

			$array = array(
					'user_name' 		=> $_POST['name'],
					'email' 	=> $_POST['email'],
					'password' 	=> $password,
					'level'		=> $_POST['level'],
					'picture'	=> $_FILES['picture']['name'],
				);

			$id 	= $_POST['id'];

			$this->upload();

			$update = $this->model->update($this->data, $id, $array);
			$this->refreshURL();

		}

// ============================================================ CATEGORY

		function category(){
			$this->check_user_level();
			$view = $this->limiter($this->data, 10);
			include_once("content/admin_category.php");
		}

		function insert_category(){
			$array = array(
					'category_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			// die(print_r($check));
			$insert = $this->model->insert($this->data, $check);
			$this->refreshURL();
		}

		function update_category(){
			$array = array(
					'category_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->refreshURL();
		}

// ============================================================= COMMENT

		function comment(){
			$this->check_user_level();
			$tables = array('article', 'user');
			$view = $this->limiter2($tables, $this->data, 10);
			include_once("content/admin_comment.php");
		}

		function insert_comment(){
			$array = array(
					'comment_content' 		=> $_POST['content'],
					'article_id'			=> $_POST['article'],
					'user_id'				=> $_POST['user']
				);

			$check = $this->check_input($array);

			// die(print_r($check));
			$insert = $this->model->insert('comment', $check);
			$this->refreshURL();
		}

		function update_comment(){
			$array = array(
					'comment_content' 		=> $_POST['content'],
				);

			$check = $this->check_input($array);

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->refreshURL();
		}

// ============================================================= PLACE

		function place(){
			$this->check_user_level();
			$view = $this->limiter($this->data, 10);
			include_once("content/admin_place.php");
		}

		function insert_place(){
			$array = array(
					'place_name' 		=> $_POST['name'],
					'place_picture'		=> $_FILES['picture']['name']
				);

			$check = $this->check_input($array);
			$this->upload();
			// die(print_r($check));
			$insert = $this->model->insert($this->data, $check);
			$this->refreshURL();
		}

		function update_place(){
			$array = array(
					'place_name' 		=> $_POST['name'],
					'place_picture'		=> $_FILES['picture']['name']
				);

			$check = $this->check_input($array);
			$this->upload();

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->refreshURL();
		}

// ============================================================ HOTEL
		function hotel(){
			$this->check_user_level();
			$tables = array('place');
			$view = $this->limiter2($tables, $this->data, 10);
			include_once('content/admin_hotel.php');
		}

		function insert_hotel(){
			$array = array(
					 'hotel_name'		=> $_POST['name'],
					 'hotel_address'	=> $_POST['address'],
					 'hotel_content'	=> $_POST['content'],
					 'place_id'		=> $_POST['place'],
					 'hotel_image'		=> $_FILES['picture']['name']

				);

			$this->upload();
			
			$insert = $this->model->insert($this->data, $array);
			$this->refreshURL();
		}

		function update_hotel(){
			$array = array(
					 'hotel_name'		=> $_POST['name'],
					 'hotel_address'	=> $_POST['address'],
					 'hotel_content'	=> $_POST['content'],
					 'place_id'			=> $_POST['place'],
					 'hotel_rate'		=> $_POST['rate'],
					 'hotel_image'		=> $_FILES['picture']['name']

				);

			$this->upload();

			$id 	= $_POST['id'];

			$insert = $this->model->update($this->data, $id, $array);
			$this->refreshURL();
		}

// ============================================================= ROOM

		function room(){
			$this->check_user_level();
			$tables = array('hotel');
			$view = $this->limiter2($tables, $this->data, 10);
			include_once("content/admin_hotel_room.php");
		}

		function insert_hotel_room(){
			$array = array(
					 'hotel_id'		=> $_POST['hotel'],
					 'room_facility'=> $_POST['facility'],
					 'room_name'	=> $_POST['name'],
					 'room_amount'	=> $_POST['amount'],
					 'room_capacity'=> $_POST['capacity'],
					 'room_price'	=> $_POST['price'],
					 'room_image'	=> $_FILES['picture']['name']
				);

			$insert = $this->model->insert($this->data, $array);
			$this->refreshURL();
		}

		function update_hotel_room(){
			$array = array(
					 'hotel_id'		=> $_POST['hotel'],
					 'room_facility'=> $_POST['facility'],
					 'room_name'	=> $_POST['name'],
					 'room_amount'	=> $_POST['amount'],
					 'room_capacity'=> $_POST['capacity'],
					 'room_price'	=> $_POST['price'],
					 'room_image'	=> $_FILES['picture']['name']
				);

			$id = $_POST['id'];
			$this->upload();
			$update = $this->model->update($this->data, $id, $array);
			$this->refreshURL();
		}
// ============================================================== TRANSACTION
		function transaction(){

			$search = @$_POST['search'];
			$status = @$_POST['status'];
			$tables = array('user', 'hotel_room');

			include_once("content/admin_transaction.php");
			if ( !isset($_POST['btn_search']) ){
				$view = $this->limiter3($tables, $this->data, 10);

			}else{
				$view = $this->limiter4($tables, 'transaction', 10, $search, $status);
				$this->no_data($view['join']);
				// $row = $view['join']->fetch(PDO::FETCH_OBJ);
				// die(print_r($row));
			}
			include_once("content/admin_transaction_data.php");
				
		}

		function insert_transaction(){
			$day = $_POST['checkout'];
			$checkout = $this->date_day($_POST['checkin'], $day);
			$code = $this->randomcode(20);
			$room_id = $_POST['hotel_room'];
			$reserved = $_POST['reserved'];
			$array = array(
					 'transaction_code'	=> $code,
					 'checkin'			=> $_POST['checkin'],
					 'checkout'			=> $checkout,
					 'reserved'			=> $reserved,
					 'user_id'			=> $_POST['user'],
					 'hotel_room_id'	=> $room_id,
					 'transaction_pay'	=> $this->pay($room_id, $day, $reserved),
					 'status'			=> 3
				);
						// die(print_r($array));

			$this->transaction_history_insert($code, 'new');
			$this->model->insert('transaction', $array);
			$this->refreshURL();
		}

		function update_transaction(){
			// $checkout = $this->date_day($_POST['checkin'], $_POST['checkout']);
			$status = $_POST['status'];
			$id 	= $_POST['id'];
			$code 	= $_POST['code'];

			switch ($status) {
				case 0:
					$this->model->hotel_room('+1', $id);
					break;
				case 1:
					$this->model->hotel_room('-1', $id);
					break;
				case 9:
					$this->model->hotel_room('+1', $id);
					break;

				default:
					break;
			}
			$array = array(
					 // 'checkin'			=> $_POST['checkin'],
					 // 'checkout'			=> $checkout,
					 // 'reserved'			=> $_POST['reserved'],
					 // 'user_id'			=> $_POST['user'],
					 // 'hotel_room_id'	=> $_POST['hotel_room'],
					 'status'			=> $status
				);

			$this->model->update($this->data, $id, $array);
			$this->transaction_history_insert($code, $status);
			$this->refreshURL();
		}

		function date_day($datenow, $duration){
			$checkout = new DateTime($datenow);
			$checkout->modify('+' . $duration . ' day');
			$date = $checkout->format('Y-m-d');

			return $date;

		}

// ============================================================= TRANSACTION HISTORY

		function transaction_history(){
			$view = $this->limiter($this->data, 10);
			include_once("content/admin_transaction_history.php");
		}

		function transaction_history_insert($code, $status){
			$dateNow = $this->date->format('Y-m-d H:i:s');
			$array = array(
					 'transaction_history_date'		=> $dateNow,
					 'transaction_history_process'	=> $status,
					 'transaction_history_code'		=> $code
				);
			$this->model->insert('transaction_history', $array);
		}


// ============================================================= REPORT

		function report(){
			$date1 = @$_POST['date1'];
			$date2 = @$_POST['date2'];
			$status = @$_POST['status'];

			include_once("content/admin_report.php");
			if ( isset($_POST['btn_search']) ):
				$total = $this->total_pay($date1, $date2, $status);

				$view = $this->model->selectReport($date1, $date2, $status);
				$view2 = $this->model->selectReportHotel($date1, $date2, $status);

				$this->no_data($view);
				$this->no_data($view2);
								
				// if( $count > 0 ){
				// 	include_once("content/admin_report_data.php");
				// }else{
				// 	include_once("content/no_data.php");
				// }
				include_once("content/admin_report_data.php");
			endif;
			

		}

		function total_pay($date1, $date2, $status){
			if ( is_numeric($status) ){
				$what = "AND 	(transaction.status = $status)";
			}else{
				$what = '';
			}
			$query = $this->model->db->prepare("SELECT transaction.checkin,
														SUM(transaction.transaction_pay) AS total
												FROM transaction
												WHERE  (transaction.checkin BETWEEN ? AND ?)
												$what"
											);
			$date1 = "'" .$date1. "'";
			$date1 = "'" .$date2. "'";
			$query->execute(array($date1, $date2));
			$row = $query->fetch(PDO::FETCH_OBJ);

			return $row->total;
		}

		function no_data($data){
				$count = $data->rowCount();
				if ($count <= 0) {
					die(include_once('content/no_data.php'));
				}

		}

// ============================================================== GLOBAL DELETE
		function check_user_level(){
			$level = $_SESSION['level'];
			if ($level==2) {
				header("Location: ?page=admin&control=transaction");
			}
		}
		function delete(){
			$id = $_GET['delete'];
			$data = $this->data;
			if ( $data == 'transaction') {
				$query = $this->model->db->prepare(" SELECT transaction_code FROM transaction WHERE transaction_id=$id ");
				$query->execute();
				$row = $query->fetch();
				$this->transaction_history_insert($row['transaction_code'], 'delete');
			}
			$delete = $this->model->delete($data, $id);
		}

		function upload(){
			$name = $_FILES['picture']['name'];
			$dir = $_FILES['picture']['tmp_name'];

			move_uploaded_file($dir, 'assets/img/' . $name);
		}

		function check_input($array){
 			if(count(array_filter($array)) == count($array)) {
 				return $array;
			} else {
				$this->refreshURL();
			    die($alert_danger = 'ada yang kosong');
			}
		}

		function trim_value($value) 
		{ 
			foreach ($value as $key => $value) {
				$value = trim($value); 
			}
		    
		}

		function randomcode($length){
			$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
			$random = openssl_random_pseudo_bytes($length);

			$alphabet_length = strlen($alphabet);
			$result = '';

			for ($i=0; $i<$length ; ++$i) { 
				$result .= $alphabet[ord($random[$i]) % $alphabet_length];
			}

			return $result;


		}

		function pay($room_id, $day, $reserved){
			$query = $this->model->db->prepare('SELECT hotel_room_id, room_price FROM hotel_room WHERE hotel_room_id=?');
			$query->execute(array($room_id));
			$row = $query->fetch(PDO::FETCH_OBJ);

			$price = (int)$row->room_price;
			$total = $price * (int)$day * (int)$reserved;

			return $total;
		}

		function compare($value1, $value2){
			if($value1 === $value2){
				return $value1;
			}else{
				$this->refreshURL();
			}
		}

		/* REGISTER */
		function register(){

		}

		/* LOGIN */
		function login(){

		}
		
		function __destruct(){
		}
	}
?>