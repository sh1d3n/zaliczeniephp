<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Specjalizacja</th>
      <th scope="col">Telefon</th>
      <th scope="col">Usuń</th>
    </tr>
  </thead>
  <tbody>

  <?php

  require "connect.php";

  $con = new mysqli($host, $db_user, $db_password, $db_name);

  $sql = "select * from lekarze";

  $result = $con->query($sql);

  while ($row = mysqli_fetch_row($result)){
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    ?>
     <td><a href="usunlekarza.php?id=<?php echo $row[0]; ?>">Usuń</a></td>
  <?php
    echo "</tr>";
  }
  ?>
</tbody>
</table>
<p>
<a href="dodajlekarza.php">Dodaj lekarza</a>
</p>
<p>
<a href="administrator.php">Pacjenci</a>
</p>
<p>
  <p><a href="logout.php">Wyloguj</a></p>
</p>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>
