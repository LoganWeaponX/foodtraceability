<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
 $info = $_POST['name'];
 $qty = $_POST['qty'];
 $cost = $_POST['cost'];
$date = date('Y-m-d H:i:s');

 require_once('config.php');
 
 $sql ="SELECT f_id FROM farmer_add_details ORDER BY f_id ASC";
 
 $res = mysqli_query($con,$sql);
 
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['f_id'];
 }
 
 $path = "uploads/$id.png";
 
 $actualpath = "http://192.168.43.130/foodtraceability_db/v1/$path";
 
 $sql = "INSERT INTO farmer_add_details (image,name,qty,cost,food_date) VALUES ('$actualpath','$info','$qty','$cost','$date')";
 
 if(mysqli_query($con,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }