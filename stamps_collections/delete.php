

<?php

//including the database connection file
include("config.php");

    //getting id of the data from url
    $idnr = $_GET['idnr'];
    
    //deleting the row from table
    $sql = ( "DELETE FROM basic WHERE idnr=:idnr");
    $query = $dbConn->prepare($sql);
    $query->execute(array(':idnr' => $idnr));
    
    //redirecting to the display page (index.php in our case)
    header("Location:index.php");

?>

