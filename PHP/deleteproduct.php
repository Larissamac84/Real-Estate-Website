
<?php 
require 'connect.php'; 
$productid= $_GET["productid"]; 
$sql= "DELETE FROM products WHERE productid=$productid"; 
if (mysqli_query( $link, $sql)) 
{
header("Location: http://localhost/giftcompany/manageproducts.php"); 
exit; 
}
else 
{ 
echo "Could not delete product"; 
} 
mysqli_close($link); 
?>\