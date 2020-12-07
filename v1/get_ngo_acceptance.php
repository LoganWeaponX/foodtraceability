<?php
 require_once('config.php');
 
$user_name=$_GET['user_name'];

 $sql = "SELECT `food_name`, `acceptance`, `user_name` FROM `send_ngo_acceptance` WHERE user_name ='$user_name'";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('food_name'=>$row['food_name'], 'acceptance'=>$row['acceptance']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);