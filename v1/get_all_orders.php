<?php
 require_once('config.php');
 
 $sql = "SELECT `restaurant_name`, `order_name`, `order_qty`, `order_cost`, `require_qty`, `accept_cost` FROM `farmer_get_order`";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('restaurant_name'=>$row['restaurant_name'], 'order_name'=>$row['order_name'], 'require_qty'=>$row['require_qty'],
 	'accept_cost'=>$row['accept_cost']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);