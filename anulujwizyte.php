<?php

include "connect.php";
$id = $_GET['id'];
$del = mysqli_query($con,"delete from wizyty where id = '$id'");
if($del)
{
    mysqli_close($con);
    header("Location:glowna.php");
    exit;
}
else
{
    echo "Błąd usuwania.";
}
