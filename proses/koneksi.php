<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "project_1";

	$mysqli = new mysqli($host, $user, $pass, $db) or die(mysqli_error());

	//PDO
	/*try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }*/

?>