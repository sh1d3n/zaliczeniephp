<?php
require_once "connect.php";
if (
  isset($_POST["lekarz"])
) {
  $lekarz = $_POST["lekarz"];
  $idWizyty = $_GET['id'];

  $sql = "UPDATE wizyty SET lekarzId = '$lekarz' WHERE id='$idWizyty'";
  $con->query($sql);
  header('Location: administrator.php');
}
 ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Umów wizytę</title>
    <style>
      form {
        width: 40%;
        background: #ccc;
        padding: 15px;
      }
      input[type="text"] {
        width: 80%;
      }
      label {
        margin-left: 10px;
      }
    </style>
  </head>
  <body>

    <form method="POST">
      <div class="form-group">
        <label for="lekarz">nazwisko lekarza</label>
        <?php
          $query  = "SELECT * FROM `lekarze`";
          $result = mysqli_query($con, $query);
          echo "<select name='lekarz'>";
          echo "<option value='0'>Brak przydzielenia</option>";
          while ($row = mysqli_fetch_row($result)){
            echo "<option value='$row[0]'> $row[1] | $row[2] </option>";
          }
          echo "</select>"
        ?>
      </div>
      <button type="submit" class="btn btn-primary">Przydziel tego lekarza</button>
    </form>

    <a href="administrator.php"> Powrót </a>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
