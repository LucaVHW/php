<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM clients");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
  <a href="add.html">Add new data</a>
  <br>
  <br>
    <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Id</td>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Update</td>
    </tr>
    <?php
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['lastName']."</td>";
        echo "<td>".$row['firstName']."</td>";
        echo "<td>".$row['birthDate']."</td>";
        if ($row['card'] == 1) {
        echo "<td> yes </td>";
      }
      else{
        echo "<td> no </td>";
      }
        echo "<td>".$row['cardNumber']."</td>";
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

        }

    ?>
    </table>
</body>
</html>
