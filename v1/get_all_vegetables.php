<?php
 require_once('config.php');
 
 $sql = "select image,name,qty,cost from farmer_add_details";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('url'=>$row['image'],'name'=>$row['name'],'qty'=>$row['qty'],'cost'=>$row['cost']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);