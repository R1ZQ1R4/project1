<?php
	include_once("proses/model.php");

	class controller{

		public $model;
		public $data;
		public $sort;

		function __construct(){
			$this->model = new model();
			$this->data = @$_GET['control'];
			$this->sort = @$_GET['sort'];
		}

		function sort(){
			if (isset($this->sort)) {
				$link = '&sort=' . $this->sort;
				return $link;
			}
		}

		function redirect(){
			header('Location:?page=admin' . $this->sort() . '&control='.$this->data);

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

			$result = $m->selectLimit($data, $start, $limit);

			return array('result' => $result, 'page' => $pagination);
			
		}

		function limiter2($tables, $data, $limit){
			$limit = $limit;
			$s = $this->sort;
			$m = $this->model;

			$sort 	= isset($s) ? (int)$s : 1;
			$start 	= ($sort > 1) ? ($sort * $limit) - $limit : 0;

			$total = $m->selectJoinName($tables, $data);
			$total2 = $total->rowCount();
			
			$pagination = ceil($total2/$limit);
			$result = $m->selectLimit($data, $start, $limit);

			return array('result' => $result, 'page' => $pagination, 'join' => $total);
			
		}

// ============================================================ ARTICLE

		function article(){
			$tables = array('place', 'user', 'category');
			$view = $this->limiter2($tables, $this->data, 10);
			include_once("content/admin_article.php");
		}

		function insert_article(){
			$array = array(
					'article_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			// die(print_r($check));
			$insert = $this->model->insert($this->data, $check);
			$this->redirect();
		}

		function update_article(){
			$array = array(
					'article_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->redirect();
		}

//  ========================================================= USER
		function user(){
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
			$this->redirect();
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
			$this->redirect();

		}

// ============================================================ CATEGORY

		function category(){
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
			$this->redirect();
		}

		function update_category(){
			$array = array(
					'category_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->redirect();
		}

// ============================================================= COMMENT

		function comment(){
			$view = $this->limiter($this->data, 10);
			include_once("content/admin_comment.php");
		}

		function insert_comment(){
			$array = array(
					'comment_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			// die(print_r($check));
			$insert = $this->model->insert($this->data, $check);
			$this->redirect();
		}

		function update_comment(){
			$array = array(
					'comment_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->redirect();
		}

// ============================================================= PLACE

		function place(){
			$view = $this->limiter($this->data, 10);
			include_once("content/admin_place.php");
		}

		function insert_place(){
			$array = array(
					'place_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			// die(print_r($check));
			$insert = $this->model->insert($this->data, $check);
			$this->redirect();
		}

		function update_place(){
			$array = array(
					'place_name' 		=> $_POST['name'],
				);

			$check = $this->check_input($array);

			$id 	= $_POST['id'];

			$update = $this->model->update($this->data, $id, $array);
			$this->redirect();
		}

// ============================================================== GLOBAL DELETE
		function delete(){
			$id = $_GET['delete'];

			$delete = $this->model->delete($this->data, $id);
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
				$this->redirect();
			    die($alert_danger = 'ada yang kosong');
			}
		}

		function trim_value($value) 
		{ 
			foreach ($value as $key => $value) {
				$value = trim($value); 
			}
		    
		}

		function compare($value1, $value2){
			if($value1 === $value2){
				return $value1;
			}else{
				$this->redirect();
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