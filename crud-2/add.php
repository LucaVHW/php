<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $birthDate = $_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber = $_POST['cardNumber'];

    $card = $_POST['card'];
    if ($card == 1) {
    $card = 1;
    } else {
    $card = 0;
    }

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
        $sql = "INSERT INTO clients(lastName, firstName, birthDate, card, cardNumber) VALUES(:lastName, :firstName, :birthDate, :card, :cardNumber)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':lastName', $lastName);
        $query->bindparam(':firstName', $firstName);
        $query->bindparam(':birthDate', $birthDate);
        $query->bindparam(':card', $card);
        $query->bindparam(':cardNumber', $cardNumber);
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
