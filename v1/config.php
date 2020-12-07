<?php
$username="root";  
$password="";  
$hostname = "localhost";  
$db_name = "food_traceability";
//connection string with database  
$con = mysqli_connect($hostname, $username, $password,$db_name)  
or die("Unable to connect to MySQL");  
// echo "Connected to MySQL<br>";  
?>