<?php
include("sesja.php");
require_once "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Strona główna</title>
</head>
<body>
    <div class="form">
        <p>Witaj, <?php echo $_SESSION['username']; ?>!</p>
        <p>Tu możesz zobaczyć swoje wizyty.</p>

        <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nazwisko pacjenta</th>
          <th scope="col">Powód</th>
          <th scope="col">Lekarz</th>
          <th scope="col">ID Pacjenta</th>
          <th scope="col">Data</th>
          <th scope="col">Anuluj</th>
        </tr>
      </thead>
      <tbody>

      <?php



      $con = new mysqli($host, $db_user, $db_password, $db_name);

      $sql = "select * from wizyty WHERE pacjentId='".$_SESSION['user_id']."'";

      $result = $con->query($sql);

      while ($row = mysqli_fetch_row($result)){
        echo "<tr>";
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";

        ?>
         <td><a href="anulujwizyte.php?id=<?php echo $row[0]; ?>">Anuluj</a></td>
      <?php
        echo "</tr>";
      }
      ?>
    </tbody>
    </table>
        <p><a href="dodajwizyte.php"> Zamów wizytę </a></p>
        <p><a href="logout.php">Wyloguj</a></p>
    </div>
</body>
</html>
