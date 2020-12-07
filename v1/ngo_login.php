
<?php 
 
require_once '../include/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['ngo_email']) and isset($_POST['ngo_password'])){
        $db = new DbOperations(); 
 
        if($db->NGOLogin($_POST['ngo_email'], $_POST['ngo_password'])){
            $user = $db->getNGOByUsername($_POST['ngo_email']);
            $response['error'] = false; 
            $response['id'] = $user['id'];
             $response['ngo_name'] = $user['ngo_name'];
            $response['ngo_email'] = $user['ngo_email'];
            
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