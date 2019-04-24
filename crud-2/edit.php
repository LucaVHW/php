<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $lastName=$_POST['lastName'];
    $firstName=$_POST['firstName'];
    $birthDate=$_POST['birthDate'];
    $card=$_POST['card'];
    $cardNumber=$_POST['cardNumber'];

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
    // } else {
        //updating the table
        $sql = "UPDATE clients SET lastName=:lastName, firstName=:firstName, birthDate=:birthDate, card=:card, cardNumber=:cardNumber WHERE id=:id";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':id', $id);
        $query->bindparam(':lastName', $lastName);
        $query->bindparam(':firstName', $firstName);
        $query->bindparam(':birthDate', $birthDate);
        $query->bindparam(':card', $card);
        $query->bindparam(':cardNumber', $cardNumber);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
// }
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM clients WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $lastName = $row['lastName'];
    $firstName = $row['firstName'];
    $birthDate = $row['birthDate'];
    $card = $row['card'];
    $cardNumber = $row['cardNumber'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Last name</td>
                <td><input type="text" name="lastName" value="<?php echo $lastName;?>"></td>
            </tr>
            <tr>
                <td>First name</td>
                <td><input type="text" name="firstName" value="<?php echo $firstName;?>"></td>
            </tr>
            <tr>
                <td>Birth date</td>
                <td><input type="date" name="birthDate" value="<?php echo $birthDate;?>"></td>
            </tr>
            <tr>
                <td>Loyalty card?</td>
                <td><input type="checkbox" name="card" value="1" checked></td>
            </tr>
            <tr>
                <td>Card number</td>
                <td><input type="number" name="cardNumber" value="<?php echo $cardNumber;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
