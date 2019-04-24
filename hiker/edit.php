<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $name=$_POST['name'];
    $difficulty=$_POST['difficulty'];
    $distance=$_POST['distance'];
    $duration=$_POST['duration'];
    $height_difference=$_POST['height_difference'];

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
        $sql = "UPDATE hiking SET name=:name, difficulty=:difficulty, distance=:distance, duration=:duration, height_difference=:height_difference WHERE id=:id";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':difficulty', $difficulty);
        $query->bindparam(':distance', $distance);
        $query->bindparam(':duration', $duration);
        $query->bindparam(':height_difference', $height_difference);
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
$sql = "SELECT * FROM hiking WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['name'];
    $difficulty = $row['difficulty'];
    $distance = $row['distance'];
    $duration = $row['duration'];
    $height_difference = $row['height_difference'];
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
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Difficulty</td>
                <td><input type="text" name="difficulty" value="<?php echo $difficulty;?>"></td>
            </tr>
            <tr>
                <td>Distance</td>
                <td><input type="text" name="distance" value="<?php echo $distance;?>"></td>
            </tr>
            <tr>
                <td>Duration</td>
                <td><input type="text" name="duration" value="<?php echo $duration;?>"></td>
            </tr>
            <tr>
                <td>Height difference</td>
                <td><input type="text" name="height_difference" value="<?php echo $height_difference;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
