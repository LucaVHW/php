
<?php

try
{
	// We connect to MySQL
	$dbConn = new PDO ('mysql:host=localhost;dbname=stamps_app;charset=utf8', 'root', 'Noddels5565');
	echo '***  The connection is succesfully made' . '<br>';

	// set the PDO error mode to exception
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
// In case of error, we display a message and stop everything
	die ('Error: mySQL kan niet gestart worden ??'. $e-> getMessage());
}

?>
