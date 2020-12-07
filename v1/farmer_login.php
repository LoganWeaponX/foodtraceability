
<?php 
 
require_once '../include/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['f_username']) and isset($_POST['f_password'])){
        $db = new DbOperations(); 
 
        if($db->farmerLogin($_POST['f_username'], $_POST['f_password'])){
            $user = $db->getFarmerByUsername($_POST['f_username']);
            $response['error'] = false; 
            $response['f_id'] = $user['f_id'];
             $response['f_name'] = $user['f_name'];
            $response['f_username'] = $user['f_username'];
            
        }else{
            $response['error'] = true; 
            $response['message'] = "Invalid username or password";          
        }
 
    }else{
        $response['error'] = true; 
        $response['message'] = "Required fields are missing";
    }
}
 
echo json_encode($response);
?>