

<?php
require_once('config.php');


 $sql = "DELETE FROM `farmer_add_details` WHERE food_date < (NOW() - INTERVAL 1 DAY)";


 if(mysqli_query($con,$sql))
{
 echo 'Successfully deleted';
}
else
{
 echo 'Something went wrong';
 }
 
 mysqli_close($con);
?>