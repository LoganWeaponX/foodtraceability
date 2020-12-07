<?php
 require_once('config.php');
 
 $restaurant_name=$_GET['restaurant_name'];

 
 $sql = "SELECT `id`, `f_name`, `restaurant_name`, `order_name`, `order_qty`, `order_cost`, `note` FROM `farmer_send_notfication` WHERE restaurant_name ='$restaurant_name'";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('f_name'=>$row['f_name'],'restaurant_name'=>$row['restaurant_name'], 'order_name'=>$row['order_name'], 'order_qty'=>$row['order_qty'],
 	'order_cost'=>$row['order_cost'],'note'=>$row['note']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);