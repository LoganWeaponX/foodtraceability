<?php
 require_once('config.php');
 
 $sql = "SELECT  `ngo_name`, `ngo_address`, `ngo_contact`, `ngo_email` FROM `ngo_list`";
 
 $res = mysqli_query($con,$sql);
 
 $result = array();
 
 while($row = mysqli_fetch_array($res)){
 array_push($result,array('ngo_name'=>$row['ngo_name'], 'ngo_address'=>$row['ngo_address'], 'ngo_contact'=>$row['ngo_contact'],'ngo_email'=>$row['ngo_email']));
 }
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($con);