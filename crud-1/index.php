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
    <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Collumn</td>
        <td>Collumn</td>
    </tr>
    <?php
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
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
        }
    ?>
    </table>
</body>
</html>
