<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 

 $food_name = $_POST['food_name'];
 $acceptance = $_POST['acceptance'];
 $user_name = $_POST['user_name'];

 require_once('config.php');
 
 
 $sql = "INSERT INTO `send_ngo_acceptance`(`food_name`, `acceptance`, `user_name`) VALUES ('$food_name','$acceptance','$user_name')";
 
 if(mysqli_query($con,$sql)){
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }