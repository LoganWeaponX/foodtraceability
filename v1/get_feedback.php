<?php
 require_once('config.php');
 $place_name=$_GET['place_name'];

 
 $sql = "SELECT `id`, `place_name`, `user`, `user_feedback`, `ratings` FROM `send_feedback` WHERE place_name ='$place_name'";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('place_name'=>$row['place_name'],'user'=>$row['user'], 'user_feedback'=>$row['user_feedback'], 'ratings'=>$row['ratings']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);