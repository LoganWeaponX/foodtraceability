<?php
 require_once('config.php');
 
 $ngo_email=$_GET['ngo_email'];
 $sql = "SELECT `image`, `name`, `time_period` , `email` FROM send_food_ngo WHERE `ngo_email` = '$ngo_email';";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('url'=>$row['image'],'name'=>$row['name'],'time_period'=>$row['time_period'],'email'=>$row['email']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);