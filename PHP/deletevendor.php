<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["vendor_email"])) {
  $vendor_email = $_GET["vendor_email"];

  $sql_delete_vendor = "DELETE FROM vendor WHERE vendor_email = ?";
  $stmt_delete_vendor = mysqli_prepare($link, $sql_delete_vendor);
  mysqli_stmt_bind_param($stmt_delete_vendor, "s", $vendor_email);
  mysqli_stmt_execute($stmt_delete_vendor);

  if (mysqli_stmt_affected_rows($stmt_delete_vendor) > 0) {
    header("Location: managevendors.php");
    exit;
  } else {
    echo "The vendor could not be deleted.";
  }

  mysqli_stmt_close($stmt_delete_vendor);
} else {
  echo "No vendor email provided.";
}

mysqli_close($link);
?>
