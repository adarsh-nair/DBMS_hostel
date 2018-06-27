<?php
	$servername = 'localhost';
	$DB_NAME = 'hostel';
	$DB_USER = 'root';
	$DB_PASS = '';
	try {
	$conn = new PDO('mysql:dbname = '.$DB_NAME.';host = '.$servername,$DB_USER,$DB_PASS);
	$sql = 'SELECT Password from Hostelite';
	$stmt = $conn->query($sql);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->execute();
	foreach($result as $query) {
		 

  }
	} catch(PDOException $pdo) {
		$conn = null;
		die('Error : '.$pdo->getMessage());
	}













?>
