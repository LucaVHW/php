<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['city'])) {
    $city = $_POST['city'];
    $high = $_POST['high'];
    $low = $_POST['low'];

    // checking empty fields
    if(empty($city) || empty($high) || empty($low)) {

        if(empty($city)) {
            echo "<font color='red'>City field is empty.</font><br/>";
        }

        if(empty($high)) {
            echo "<font color='red'>High field is empty.</font><br/>";
        }

        if(empty($low)) {
            echo "<font color='red'>Low field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $sql = "INSERT INTO Weather(city, high, low) VALUES(:city, :high, :low)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':city', $city);
        $query->bindparam(':high', $high);
        $query->bindparam(':low', $low);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
