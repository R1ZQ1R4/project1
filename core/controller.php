<?php
	include_once("proses/model.php");

	class controller{

		public $model;

		function __construct(){
			$this->model = new model();
		}

		function limiter($data, $limit){
			$limit = $limit;
			$sort 	= isset($_GET['sort']) ? (int)$_GET['sort'] : 1;
			$start 	= ($sort > 1) ? ($sort * $limit) - $limit : 0;

			$total = $this->model->selectAll($data);
			$total = $total->num_rows;
			$pagination = ceil($total/$limit);

			$result = $this->model->selectLimit($data, $start, $limit);
			return array($result, $pagination);
		}

		function user(){

			$data = $this->limiter('user', 10);
			include_once("content/admin_user.php");
		}

		function insert(){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$pass = $_POST['password'];

			$insert = $this->model->insertUser($name, $email, $pass);
			
			header('Location: ?page=admin&control=user');
		}

		function update(){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$pass = $_POST['password'];
			$picture = $_FILES['picture']['name'];
			$level = $_POST['level'];

			$this->upload();

			$update = $this->model->updateUser($name, $email, $pass, $level, $picture, $id);

			header('Location: ?page=admin&control=user');
		}

		function upload(){
			$name = $_FILES['picture']['name'];
			$dir = $_FILES['picture']['tmp_name'];

			move_uploaded_file($dir, 'assets/img/' . $name);
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