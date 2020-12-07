<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $f_name=$_POST['f_name'];
 $restaurant_name = $_POST['restaurant_name'];
 $order_name = $_POST['order_name'];
 $order_qty = $_POST['order_qty'];
 $order_cost = $_POST['order_cost'];
 $note=$_POST['note'];
 $date = date('Y-m-d H:i:s');




 require_once('config.php');
 
 $sql ="SELECT id FROM farmer_send_notfication ORDER BY id ASC";
 
 $res = mysqli_query($con,$sql);
 
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['id'];
 }
 
 
 
 $sql = "INSERT INTO `farmer_send_notfication`(`f_name`, `restaurant_name`, `order_name`, `order_qty`, `order_cost`, `note`,`order_date`) VALUES ('$f_name','$restaurant_name','$order_name','$order_qty','$order_cost','$note','$date')";
 
 if(mysqli_query($con,$sql)){
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }