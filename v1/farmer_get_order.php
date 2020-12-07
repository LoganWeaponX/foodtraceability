<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $order_name = $_POST['order_name'];
 $order_name = $_POST['order_name'];
 $order_qty = $_POST['order_qty'];
 $order_cost = $_POST['order_cost'];
 $require_qty = $_POST['require_qty'];
 $accept_cost = $_POST['accept_cost'];
  $restaurant_name = $_POST['restaurant_name'];
  $date = date('Y-m-d H:i:s');



 require_once('config.php');
 
 $sql ="SELECT id FROM farmer_get_order ORDER BY id ASC";
 
 $res = mysqli_query($con,$sql);
 
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['id'];
 }
 
 
 
 $sql = "INSERT INTO farmer_get_order (restaurant_name,order_name,order_qty,order_cost,require_qty,accept_cost,order_date) VALUES ('$restaurant_name','$order_name','$order_qty','$order_cost','$require_qty','$accept_cost','$date')";
 
 if(mysqli_query($con,$sql)){
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }