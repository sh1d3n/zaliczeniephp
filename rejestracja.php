<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $haslo = stripslashes($_REQUEST['haslo']);
        $haslo = mysqli_real_escape_string($con, $haslo);
        $nazwisko = stripslashes($_REQUEST['nazwisko']);
        $nazwisko = mysqli_real_escape_string($con, $nazwisko);
        $pesel = stripslashes($_REQUEST['pesel']);
        $pesel = mysqli_real_escape_string($con, $pesel);
        $miasto = stripslashes($_REQUEST['miasto']);
        $miasto = mysqli_real_escape_string($con, $miasto);
        $ulica = stripslashes($_REQUEST['ulica']);
        $ulica = mysqli_real_escape_string($con, $ulica);

        $query    = "INSERT into `pacjenci` (username, haslo, email, nazwisko, pesel, miasto, ulica)
                     VALUES ('$username', '$haslo', '$email', '$nazwisko', '$pesel', '$miasto', '$ulica')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Zarejestrowano.</h3><br/>
                  <p class='link'>Kliknij tutaj aby <a href='logowanie.php'>zalogować.</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Proszę wypełnić wszystkie pola.</h3><br/>
                  <p class='link'>kliknij tutaj aby <a href='rejestracja.php'>spróbować ponownie.</a> again.</p>
                  </div>";
        }
    } else {
?>

<div class="container">
    <form class="form" action="" method="post">
        <h1 class="login-title">Rejestracja</h1>
        <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Nazwa" required />
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="nazwisko" placeholder="Imię i Nazwisko">
        </div>
        <div class="form-group">
        <input type="number" class="form-control" name="pesel" placeholder="Pesel">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="miasto" placeholder="Miasto">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="ulica" placeholder="Ulica">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Adres Email">
        </div>
        <div class="form-group">
        <input type="password" class="form-control" name="haslo" placeholder="Hasło">
        <input type="submit" name="submit" value="Zarejestruj" class="btn btn-primary">
        <p class="link"><a href="logowanie.php">Zaloguj</a></p>
    </form>
</div>
<?php
    }
?>
</body>
</html>
