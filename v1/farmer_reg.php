
<?php 
 
require_once '../include/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(       
              isset($_POST['f_name']) and
              isset($_POST['f_address']) and
              isset($_POST['f_mobile']) and
              isset($_POST['f_email']) and
              isset($_POST['f_username']) and
                isset($_POST['f_password']))
        {
        //operate the data further 
 
      $db = new DbOperations();

      $result = $db->createFarmer($_POST['f_name'], $_POST['f_address'],
                  $_POST['f_mobile'],$_POST['f_email'],$_POST['f_username'],$_POST['f_password']
                  );

      if($result== 1){

         $response['error'] = false; 
        $response['message'] = "Farmer registered successfully";

      }elseif($result==2){

         $response['error'] = true; 
    $response['message'] = "some error occured please try again";
      }
    
    }else{
        $response['error'] = true; 
        $response['message'] = "Required fields are missing";
    }
}else{
    $response['error'] = true; 
    $response['message'] = "Invalid Request";
}

echo json_encode($response);
