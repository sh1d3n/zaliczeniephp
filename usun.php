<?php

include "connect.php";
$id = $_GET['id'];
$del = mysqli_query($con,"delete from pacjenci where id = '$id'");
if($del)
{
    mysqli_close($con);
    header("Location:administrator.php");
    exit;
}
else
{
    echo "Błąd usuwania.";
}
