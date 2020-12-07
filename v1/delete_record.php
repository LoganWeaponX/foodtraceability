

<?php
require_once('config.php');


 $sql = "DELETE FROM `farmer_get_order` WHERE order_date < (NOW() - INTERVAL 1 DAY)  ";
 

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