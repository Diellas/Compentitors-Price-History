<?php
// CONNECT TO THE DATABASE
	$DB_NAME = 'competitors';
	$DB_HOST = 'localhost';
	$DB_USER = 'competitors';
	$DB_PASS = '@B922ydu';
	
	$wplink = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$wplink -> set_charset("utf8");
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
?>