
<?php 
 
require_once '../include/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(       
              isset($_POST['ngo_name']) and
              isset($_POST['ngo_address']) and
              isset($_POST['ngo_contact']) and
              isset($_POST['ngo_email']) and
              isset($_POST['ngo_password'])
                                        )
        {
        //operate the data further 
 
      $db = new DbOperations();

      $result = $db->createNGO($_POST['ngo_name'],$_POST['ngo_address'],$_POST['ngo_contact'],$_POST['ngo_email'],$_POST['ngo_password']
                  );

      if($result== 5){

         $response['error'] = false; 
        $response['message'] = "NGO registered successfully";

      }elseif($result==6){

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
