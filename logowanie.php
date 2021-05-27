<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    form {
      width: 40%;
      background: #ccc;
      padding: 15px;
    }
    input[type="text"] {
      width: 80%;
    }
  </style>
</head>
<body>
<?php
    require('connect.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $haslo = stripslashes($_REQUEST['haslo']);
        $haslo = mysqli_real_escape_string($con, $haslo);
        $query    = "SELECT * FROM `pacjenci` WHERE username='$username'
                     AND haslo='$haslo'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $result = mysqli_fetch_row($result);

        if ($rows == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['user_id'] = $result[0];

          if($username == 'admin') {
            header('Location: administrator.php');
          }
          else
          {
            header('Location: glowna.php');
          }
        }
       else {
            echo "<div class='form'>
                  <h3>Niepoprawne dane.</h3><br/>
                  <p class='link'>Kliknij tutaj aby <a href='logowanie.php'>zalogować</a> ponownie.</p>
                  </div>";
            }
        } else {
?>
<div class="container">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Logowanie</h1>
        <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Nazwa" autofocus="true"/>
        </div>
        <div class="form-group">
        <input type="password" class="form-control" name="haslo" placeholder="Hasło"/>
        </div>
        <input type="submit" value="Login" name="submit" class="btn btn-primary"/>
        <p class="link"><a href="rejestracja.php">Załóż konto</a></p>
  </form>
</div>
<?php
    }
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
