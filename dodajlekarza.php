<?php

if (
  isset($_GET["nazwisko"]) &&
  isset($_GET["specjalizacja"]) &&
  isset($_GET["telefon"])
) {
  $nazwisko = $_GET["nazwisko"];
  $specjalizacja = $_GET["specjalizacja"];
  $telefon = $_GET["telefon"];

  require "connect.php";
  $con = new mysqli($host, $db_user, $db_password, $db_name);
  $sql = "insert into lekarze (nazwisko, specjalizacja, telefon) values ('$nazwisko', '$specjalizacja', '$telefon');";
  $con->query($sql);

  $con->close();
}
 ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Dodaj Lekarza</title>
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
        <label for="nazwisko">Nazwisko</label>
        <input type="text" class="form-control" name = "nazwisko" id="nazwisko">
      </div>

      <div class="form-group">
        <label for="specjalizacja">Specjalizacja</label>
        <input type="text" class="form-control" name = "specjalizacja" id="specjalizacja">
      </div>

      <div class="form-group">
        <label for="telefon">Telefon</label>
        <input type="number" class="form-control" name = "telefon" id="telefon">
      </div>

      <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>

    <a href="lekarze.php"> Powrót </a>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>