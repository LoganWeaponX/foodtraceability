
<?php 
 
require_once '../include/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['username']) and isset($_POST['password'])){
        $db = new DbOperations(); 
 
        if($db->restaurantLogin($_POST['username'], $_POST['password'])){
            $user = $db->getRestaurantByUsername($_POST['username']);
            $response['error'] = false; 
            $response['id'] = $user['id'];
             $response['name'] = $user['name'];
            $response['username'] = $user['username'];
            
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