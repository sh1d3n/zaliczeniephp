<?php
require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Pesel</th>
      <th scope="col">Miasto</th>
      <th scope="col">Ulica</th>
      <th scope="col">Email</th>
      <th scope="col">Usuń</th>
    </tr>
  </thead>
  <tbody>

  <?php



  $con = new mysqli($host, $db_user, $db_password, $db_name);

  $sql = "select * from pacjenci limit 1000 offset 1";

  $result = $con->query($sql);

  while ($row = mysqli_fetch_row($result)){
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[4] </td>";
    echo "<td> $row[5] </td>";
    echo "<td> $row[6] </td>";
    echo "<td> $row[7] </td>";
    echo "<td> $row[2] </td>";
    ?>
     <td><a href="usun.php?id=<?php echo $row[0]; ?>">Usuń</a></td>
  <?php
    echo "</tr>";
  }
  ?>
</tbody>
</table>

<table class="table">
<thead class="thead-dark">
<tr>
  <th scope="col">#</th>
  <th scope="col">Nazwisko pacjenta</th>
  <th scope="col">Powód</th>
  <th scope="col">Lekarz</th>
  <th scope="col">Data</th>
  <th scope="col">Anuluj</th>
</tr>
</thead>
<tbody>

<?php

$con = new mysqli($host, $db_user, $db_password, $db_name);

$sql = "select * from wizyty";

$result = $con->query($sql);

while ($row = mysqli_fetch_row($result)){
  $sql2 = "select * from lekarze WHERE id='$row[3]'";
  $result2 = $con->query($sql2);
  $resultRow = mysqli_fetch_row($result2);
  $lekarz = is_array($resultRow) ? $resultRow[1] : null;

echo "<tr>";
echo "<td> $row[0] </td>";
echo "<td> $row[1] </td>";
echo "<td> $row[2] </td>";
?>
<td><a href="przydziel.php?id=<?php echo $row[0]; ?>">Przydziel</a> <?php echo (isset($lekarz) ? '('.$lekarz.')' : '');?></td>
<?php

?>
 <td><a href="anulujwizyte.php?id=<?php echo $row[0]; ?>">Anuluj</a></td>
<?php
echo "</tr>";
}
?>
</tbody>
</table>

<p><a href="lekarze.php">Lekarze</a></p>
<p><a href="logout.php">Wyloguj</a></p>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>
