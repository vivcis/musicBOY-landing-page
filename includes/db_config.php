<?php 	
	define('DB_USER', "musicboyUser");
	define('DB_PASSWORD', "qwerty1234");
	define('DB_NAME', "music_boy_db");
	define('DB_SERVER', "localhost");

	$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to database: ".mysqli_connect_error();
	}
 ?>