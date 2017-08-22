<?php
/* https://gist.github.com/rob-murray/5454707 */
class Database {
	
    private $dsn = 'mysql:host=localhost; dbname=project_1';
    private $user = 'root';
    private $password = '';

	protected $db;
	protected static $_instance = null;

	public function __construct() {

	}

	public static function instance() {

		if (self::$_instance === null) {

			self::$_instance = new Database();
		}

		return self::$_instance;
	}

	public function getInstance(){
		try{
			$this->db = new PDO($this->dsn, $this->user, $this->password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $this->db;
		}
		catch(PDOException $e) {
			echo "ERROR" . $e->getMessage();
		}
	}

}
?>