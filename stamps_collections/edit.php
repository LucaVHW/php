
<?php

// including the database connection file
include_once("config.php");
 

if(isset($_POST['update']))
{    
    $idnr = $_POST['idnr'];
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
    if(empty($idnr) || empty($catnr) || empty($sernr)) { 
 
		if(empty($idnr)) { 
			echo "<font color='darkslategrey'>Pliz fill out empty country field !!</font><br>"; 
			}; 
			if(empty($catnr)) { 
				echo "<font color='darkslategrey'>Pliz fill out empty cat.nr field !!</font><br>"; 
			};
			if(empty($sernr)) { 
				echo "<font color='darkslategrey'>Pliz fill out empty ser.nr field !!</font><br>"; 
			};

    } else {    

        // include_once("config.php");

        //updating the table

        $sql = "UPDATE basic SET (idnr=$idnr, country=$country, sellyy=$sellyy, sellmm=$sellmm, catnr=$catnr, sernr=$sernr, staat=$staat, kind=$kind, priceused=$priceused, priceunused=$priceunused, priceextra=$priceextra, theme=$theme, collecties=$collecties)  WHERE idnr=$idnr";
        
        $query = $dbConn->prepare($sql);
        
        // $query->bindparam(':idnr', $idnr); 
        // $query->bindparam(':country', $country); 
		// $query->bindparam(':sellyy', $sellyy); 
		// $query->bindparam(':sellmm', $sellmm); 
		// $query->bindparam(':catnr', $catnr); 
		// $query->bindparam(':sernr', $sernr); 
		// $query->bindparam(':staat', $staat);
		// $query->bindparam(':kind', $kind); 
		// $query->bindparam(':priceused', $priceused); 
		// $query->bindparam(':priceunused', $priceunused);
		// $query->bindparam(':priceextra', $priceextra); 
		// $query->bindparam(':theme', $theme); 
        // $query->bindparam(':collecties', $collecties);

        $query->execute();

        // $stmt = $dbConn->prepare($sql);
        // $stmt->execute();

        // $query = $dbConn->prepare($sql);
        // $stmt->execute();
        // echo $stmt->rowCount() . "records updated successfully";

        //display success message
        echo "<font color='green'>Data changed successfully.";
        echo "<br/><a href='index.php'>View Result</a>";

        //redirecting to the display page. In our case, it is index.php
        // header("Location: index.php");
    }
}



//getting id from url
$idnr = $_GET['idnr'];

//selecting data associated with this particular id
$sql = "SELECT * FROM basic WHERE idnr=$idnr";
$query = $dbConn->prepare($sql);
$query->execute();


while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $idnr = $row['idnr'];
    $country = $row['country']; 
	$sellyy = $row['sellyy']; 
	$sellmm = $row['sellmm']; 
	$catnr = $row['catnr']; 
	$sernr = $row['sernr']; 
	$staat = $row['staat'];
	$kind = $row['kind']; 
	$priceused = $row['priceused']; 
	$priceunused = $row['priceunused'];
	$priceextra = $row['priceextra']; 
	$theme = $row['theme']; 
    $collecties = $row['collecties'];
    var_dump ($idnr);
}

?>
<html>
<head>    
    <title>Edit_PHP</title>
</head>
 
<body>
    
    <br>
    <hr>
    <br>
    <a href="index.php"> Home </a>
    <br>
    <br>
    <hr>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">

            <tr> 
                <td>IDNR</td>
                <td><input type="number" name="idnr" value="<?php echo $idnr;?>"></td>
            </tr>
                
            <tr> 
                <td>Country</td>
                <td><input type="text" name="country" value="<?php echo $country;?>"></td>
            </tr>
            
            <tr> 
                <td>Sellyy</td>
                <td><input type="number" name="sellyy" value="<?php echo $sellyy;?>"></td>
            </tr>
            <tr> 
                <td>Sellmm</td>
                <td><input type="number" name="sellmm" value="<?php echo $sellmm;?>"></td>
            </tr>
            <tr> 
                <td>CatNr</td>
                <td><input type="text" name="catnr" value="<?php echo $catnr;?>"></td>
            </tr>
            <tr> 
                <td>SerNr</td>
                <td><input type="text" name="sernr" value="<?php echo $sernr;?>"></td>
            </tr>
            <tr> 
                <td>Staat</td>
                <td><input type="text" name="staat" value="<?php echo $staat;?>"></td>
            </tr>
            <tr> 
                <td>Kind</td>
                <td><input type="text" name="kind" value="<?php echo $kind;?>"></td>
            </tr>
            <tr> 
                <td>Pr.Used</td>
                <td><input type="number" name="priceused" value="<?php echo $priceused;?>"></td>
            </tr>
            <tr> 
                <td>Pr.UnUsed</td>
                <td><input type="number" name="priceunused" value="<?php echo $priceunused;?>"></td>
            </tr>
            <tr> 
                <td>Pr.Extra</td>
                <td><input type="number" name="priceextra" value="<?php echo $priceextra;?>"></td>
            </tr>
            <tr> 
                <td>Theme</td>
                <td><input type="text" name="theme" value="<?php echo $theme;?>"></td>
            </tr>
            <tr> 
                <td>Collecties</td>
                <td><input type="text" name="collecties" value="<?php echo $collecties;?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="idnr" value="<?php echo $_GET['idnr'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>

        </table>
    </form>
</body>
</html>

