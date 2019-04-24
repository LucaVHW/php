

<?phpz

// including the database connection file
include_once("config.php");

try {
     $sql = "UPDATE basic SET `idnr`=11, `country`='oo', `year`=2013, `month`=11, `catnr`='JKJIUIJK', `sernr`='LKLKLKIO', `state`='',kind='', `priceused`=0, `priceunused`=0, `priceextra`=0, `theme`='', `collection`='' WHERE `idnr`=11";
        // $query = $dbConn->prepare($sql);
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        echo $stmt->rowCount() . "records updated successfully";
}

catch (PDOException $e) {
    // In case of error, we display a message and stop everything
	die ('Error'. $e-> getMessage());
}

$dbConn = null;
       
?>      
