<?php
require_once "connect.php";
require_once "sesja.php";
if (
  isset($_GET["nazwisko"]) &&
  isset($_GET["przyczyna"])
) {
  $nazwisko = $_GET["nazwisko"]; //dodaj escape
  $przyczyna = $_GET["przyczyna"]; //tutaj tez
  $pacjentId = $_SESSION['user_id'];


  $con = new mysqli($host, $db_user, $db_password, $db_name);
  $sql = "insert into wizyty (nazwisko, przyczyna, pacjentId) values ('$nazwisko', '$przyczyna', '$pacjentId');";
  $con->query($sql);

  $con->close();
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

    <form method="GET">
      <div class="form-group">
        <label for="przyczyna">Podaj swoje objawy</label>
        <input type="text" class="form-control" name = "przyczyna" id="przyczyna">
      </div>
      <div class="form-group">
        <label for="nazwisko">Wpisz nazwisko</label>
        <input type="text" class="form-control" name = "nazwisko" id="nazwisko">
      </div>

      <button type="submit" class="btn btn-primary">Zamów wizytę</button>
    </form>

    <a href="glowna.php"> Powrót </a>

    
  </body>
</html>
