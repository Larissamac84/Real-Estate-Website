<?php
require 'connect.php';
$propertyid = $_GET["propertyid"];
$sql = "DELETE FROM property WHERE propertyid = $propertyid";
if (mysqli_query($link, $sql)) {
    header("Location: http://localhost/property/manageproperty.php");
    exit;
} else {
    echo "Could not delete property";
}
mysqli_close($link);
?>
