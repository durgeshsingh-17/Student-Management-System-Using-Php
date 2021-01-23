<?php	
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_PASSWORD', '');
	DEFINE('DB_USER', 'root');
	DEFINE('DB_NAME', 'sms');

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (!$conn) {
	    echo "Unable to connect database";
	    exit();
	}
