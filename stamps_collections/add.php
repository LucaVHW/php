
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add_PHP</title>
</head>
<body>
	
</body>
</html>

<?php

//including the database connection file
include_once("config.php"); 

//checking if data has been entered

if ( isset($_POST['country'] )) { 

	$country = $_POST['country']; 
	$sellyy = $_POST['sellyy']; 
	$sellmm = $_POST['sellmm']; 
	$catnr = $_POST['catnr']; 
	$sernr = $_POST['sernr']; 
	$staat = $_POST['staat'];
	$kind = $_POST['kind']; 
	$priceused = $_POST['priceused']; 
	$priceunused = $_POST['priceunused'];
	$priceextra = $_POST['priceextra']; 
	$theme = $_POST['theme']; 
	$collecties = $_POST['collecties'];
 
	// checking empty fields
	if(empty($country) || empty($catnr) || empty($sernr)) { 
 
		if(empty($country)) { 
			echo "<font color='darkslategrey'>Pliz fill out empty country field !!</font><br>"; 
			}; 
			if(empty($catnr)) { 
				echo "<font color='darkslategrey'>Pliz fill out empty cat.nr field !!</font><br>"; 
			};
			if(empty($sernr)) { 
				echo "<font color='darkslategrey'>Pliz fill out empty ser.nr field !!</font><br>"; 
			};
			 
			//link to the previous page 
			echo "<a href='javascript:self.history.back();'>Go Back</a>"; 
 
		} else { 
 
		// if all the fields are filled out  
		//inserting data into table 
 
		$sql = "INSERT INTO basic(country, sellyy, sellmm, catnr, sernr, staat, kind, priceused, priceunused, priceextra, theme, collecties)  VALUES(:country, :sellyy, :sellmm, :catnr, :sernr, :staat, :kind, :priceused, :priceunused, :priceextra, :theme, :collecties )"; 
 
		$query = $dbConn->prepare($sql); 
				 
		$query->bindparam(':country', $country); 
		$query->bindparam(':sellyy', $sellyy); 
		$query->bindparam(':sellmm', $sellmm); 
		$query->bindparam(':catnr', $catnr); 
		$query->bindparam(':sernr', $sernr); 
		$query->bindparam(':staat', $staat);
		$query->bindparam(':kind', $kind); 
		$query->bindparam(':priceused', $priceused); 
		$query->bindparam(':priceunused', $priceunused);
		$query->bindparam(':priceextra', $priceextra); 
		$query->bindparam(':theme', $theme); 
		$query->bindparam(':collecties', $collecties);

		$query->execute(); 
 
		//display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";

	};
};

?> 

