
<?php 
 
require_once '../include/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(       
              isset($_POST['name']) and
              isset($_POST['address']) and
              isset($_POST['mobile']) and
              isset($_POST['email']) and
              isset($_POST['username']) and
              isset($_POST['password']))
        {
        //operate the data further 
 
      $db = new DbOperations();

      $result = $db->createRestUser($_POST['name'],$_POST['address'],$_POST['mobile'],$_POST['email'],$_POST['username'], $_POST['password']
                  );

      if($result== 3){

         $response['error'] = false; 
        $response['message'] = "User registered successfully";

      }elseif($result==4){

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
