<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    // checking empty fields
    // if(empty($name) || empty($difficulty) || empty($distance)) || empty($duration) || empty($height_difference) {
    //
    //     if(empty($name)) {
    //         echo "<font color='red'>Name field is empty.</font><br/>";
    //     }
    //
    //     if(empty($difficulty)) {
    //         echo "<font color='red'>Difficulty field is empty.</font><br/>";
    //     }
    //
    //     if(empty($distance)) {
    //         echo "<font color='red'>Distance field is empty.</font><br/>";
    //     }
    //
    //     if(empty($duration)) {
    //         echo "<font color='red'>Duration field is empty.</font><br/>";
    //     }
    //
    //     if(empty($height_difference)) {
    //         echo "<font color='red'>Height difference field is empty.</font><br/>";
    //     }



        //link to the previous page
//        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
//    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $sql = "INSERT INTO hiking(name, difficulty, distance, duration, height_difference) VALUES(:name, :difficulty, :distance, :duration, :height_difference)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':name', $name);
        $query->bindparam(':difficulty', $difficulty);
        $query->bindparam(':distance', $distance);
        $query->bindparam(':duration', $duration);
        $query->bindparam(':height_difference', $height_difference);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
//    }
}
?>
</body>
</html>
