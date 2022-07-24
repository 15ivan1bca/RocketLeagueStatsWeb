
<!DOCTYPE html>
<html>
<head>

<style>
	body {
  background-color: #404040;
}
	th {
	background-color: #404040;
	font-weight: bold;
	}
	table, td, th {
  font-family: helvetica;
  border-color: grey;
  background-color: #2b2d2f;
  color: white;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  border-spacing: 15px;

}
</style>

<title>ROCKET LEAGUE</title>
</head>
<body>

<?php
     $servername = "a";
    $username = "b";
    $password = "c";
    $dbname = "d";

	try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM rlstatsusers ORDER BY mmr DESC";
        $result = $conn->query($sql);

?>
<table>
	<tr>
		<th>USUARIO</th>
		<th></th>
		<th>RANGO</th>
    <th></th>
		<th>DIVISION</th>
    <th>MMR</th>
		<th>RACHA DE VICTORIAS</th>
		<th>JUGADOS</th>
	</tr>
	
<?php	
  while ($row = $result->fetch_assoc()) {?>

  <tr>
  
    <td><?php echo $row["name"]; ?> </td>
    <td><img src="<?php echo $row["avatar"];?>" height=40 width=40></img> </td>
	  <td><?php echo $row["rango"]; ?></td>
    <td><img src="<?php echo $row["imagenRango"];?>" height=40 width=40></img> </td>
	  <td><?php echo $row["division"]; ?></td>
    <td><?php echo $row["mmr"]; ?></td>

<?php if ($row["racha"] < 1){ ?>
    <td style="color: red"> <?php echo $row["racha"]; ?> </td>
<?php } else{ ?>
    <td style="color: LightGreen"> <?php echo $row["racha"]; ?> </td>
<?php } ?>
    <td><?php echo $row["jugados"]; ?></td>
  </tr>
<?php } ?>
	
<?php	
	$conn->close();
		}
		catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	?>

</table>
</body>
</html>