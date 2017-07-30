<?php include_once("core/init.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek 1</title>
    <link rel="stylesheet" type="text/css" href="assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="assets/css/modal.css">
    <link rel="stylesheet" type="text/css" href="assets/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/grid.css">
    <style>
        
    </style>
</head>

<body>
    <?php
	    $page = $_GET['page'];
	    $alamat = 'content/' . $page . '.php';
	    
	    !empty($page) && file_exists($alamat) ? include_once($alamat) : header('Location: ?page=home');
	
	?>
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript">
    </script>
</body>
</html>
