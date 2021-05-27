<?php
  include("sesja.php");
  if($_SESSION["username"] == 'admin') {
    header('Location: administrator.php');
  }
  else{
    header('Location: glowna.php');
  }
?>
