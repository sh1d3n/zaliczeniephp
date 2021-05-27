<?php
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'pacjenci';

$con = mysqli_connect("localhost","root","","pacjenci");
if (mysqli_connect_errno()){
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
