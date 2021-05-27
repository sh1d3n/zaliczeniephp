<?php

include "connect.php";
$id = $_GET['id'];
$del = mysqli_query($con,"delete from lekarze where id = '$id'");
if($del)
{
    mysqli_close($con);
    header("Location:lekarze.php");
    exit;
}
else
{
    echo "Błąd usuwania.";
}
