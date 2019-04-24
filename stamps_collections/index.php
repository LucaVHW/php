

<?php

//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM basic ORDER BY sernr ASC");


// $sql = 'SELECT * FROM basic 

// 	FROM basic a, collections b, country c, kind d, prices e, theme f

// 	FROM (basic a LEFT JOIN collections b -> ON a.basic_collection = b.collections_name;) 
// 			(basic a LEFT JOIN country c -> ON a.basic_country = c.country_name ),
// 			(basic a LEFT JOIN kind d -> ON a.basic_kind = d.kind_name),
// 			(basic a LEFT JOIN prices e -> ON a.basic_idnr = e.prices_idnr),
// 			(basic a LEFT JOIN theme f -> ON a.basic_theme = f.theme_name)
// 		';

//    mysql_select_db('stamps_app');
//    $retval = mysql_query( $sql, $dbConn );

//    if(! $retval ) {
//       die('Could not get data: ' . mysql_error());
//    }

//    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
//       echo 	"ID:{$row['basic_idnr']}  <br> ".
//          	"Country: {$row['basic_country']} <br> ".
// 			"Year: {$row['basic_year']} <br> ".
// 			"Month: {$row['basic_month']} <br> ".
// 			"CatNr: {$row['basic_catnr']} <br> ".
// 			"SerNr: {$row['basic_sernr']} <br> ".
// 			"State: {$row['basic_state']} <br> ".
// 			"Kind: {$row['basic_kind']} <br> ".
// 			"PriceUsed: {$row['basic_priceused']} <br> ".
// 			"PriceUnUsed: {$row['basic_priceunused']} <br> ".
// 			"PriceExtra: {$row['basic_priceextra']} <br> ".
// 			"Theme: {$row['basic_theme']} <br> ".
// 			"Collection: {$row['basic_collection']} <br> ".
//          	"--------------------------------<br>";
//    } 
//    echo "Fetched data successfully\n";
//    mysql_close($dbConn);

?>

<html>
<head>    
    <title>Index_PHP</title>
</head>
 
<body>
	<hr>
	<br>
	<a class="button" href="form.html"> Add New Stamps </a>
	<br><br>
	<hr/>
	<br/><br/>
 
<table width='80%' border=0>
 
    <tr bgcolor='lightblue'>
        <td>IDNR</td>
        <td>COUNTRY</td>
        <td>YEAR</td>
        <td>MONTH</td>
		<td>CATNR</td>
        <td>SERNR</td>
        <td>STATE</td>
        <td>KIND</td>
		<td>PR.USED</td>
        <td>PR.UnUsed</td>
        <td>PR.Extra</td>
        <td>THEME</td>
		<td>COLLECTION</td>
		<td>EDIT/DELETE</td>
	</tr>
	
	<?php   
	  
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {   
			     
			echo "<tr>";
			echo "<td>".$row['idnr']."</td>";
			echo "<td>".$row['country']."</td>";
			echo "<td>".$row['sellyy']."</td>";
			echo "<td>".$row['sellmm']."</td>";
			echo "<td>".$row['catnr']."</td>";
			echo "<td>".$row['sernr']."</td>";
			echo "<td>".$row['staat']."</td>";
			echo "<td>".$row['kind']."</td>";
			echo "<td>".$row['priceused']."</td>";
			echo "<td>".$row['priceunused']."</td>";
			echo "<td>".$row['priceextra']."</td>";
			echo "<td>".$row['theme']."</td>"; 
			echo "<td>".$row['collecties']."</td>";   
			
			echo "<td><a href=\"edit.php?idnr=$row[idnr]\">Edit</a> | 
					<a href=\"delete.php?idnr=$row[idnr]\" 
					onClick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";	
			echo "</tr>";
		}

		// while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		// 	echo "IDNR________:{$row['idnr']}  <br> ".
		// 		 "Country_____: {$row['basic_country']} <br> ".
		// 		 "Year________: {$row['year']} <br> ".
		// 		 "Month_______: {$row['month']} <br> ".
		// 		 "CatNr_______: {$row['catnr']} <br> ".
		// 		 "SerNr_______: {$row['sernr']} <br> ".
		// 		 "State_______: {$row['state']} <br> ".
		// 		 "Kind________: {$row['kind']} <br> ".
		// 		 "PriceUsed___: {$row['priceused']} <br> ".
		// 		 "PriceUnUsed_: {$row['priceunused']} <br> ".
		// 		 "PriceExtra__: {$row['priceextra']} <br> ".
		// 		 "Theme_______: {$row['theme']} <br> ".
		// 		 "Collection__: {$row['collection']} <br> ".
		// 		 "--------------------------------<br>";
		//  } 

		//  echo "Fetched data successfully <br><hr>";

		//  mysql_close($dbConn);

	?>
</table>
</body>
</html>
