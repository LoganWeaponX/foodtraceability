<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
 $info = $_POST['name'];
 $time_period = $_POST['time_period'];
 $ngo_email=$_POST['ngo_email'];
 $email=$_POST['email'];
 $date = date('Y-m-d H:i:s');


 require_once('config.php');
 
 $sql ="SELECT id FROM send_food_ngo ORDER BY id ASC";
 
 $res = mysqli_query($con,$sql);
 
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['id'];
 }
 
 $path = "extra_foods/$id.png";
 
 $actualpath = "http://192.168.43.130/foodtraceability_db/v1/$path";
 
 $sql = "INSERT INTO send_food_ngo (image,name,time_period,ngo_email,email,food_date) VALUES ('$actualpath','$info','$time_period','$ngo_email','$email','$date')";
 
 if(mysqli_query($con,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }