<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: logowanie.php");
        exit();
    } else {

    }
?>
