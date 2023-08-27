<?php
require 'connect.php';

if (isset($_POST["submit"])) {
  $vendor_email = $_POST["vendor_email"];
  $vendor_firstname = $_POST["vendor_firstname"];
  $vendor_surname = $_POST["vendor_surname"];
  $vendor_phone = $_POST["vendor_phone"];

  // Check if the vendor email already exists
  $sql_check_vendor = "SELECT * FROM vendor WHERE vendor_email = ?";
  $stmt = mysqli_prepare($link, $sql_check_vendor);
  mysqli_stmt_bind_param($stmt, "s", $vendor_email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    echo "The vendor email already exists. Please choose a different email.";
  } else {
    // Insert the vendor details into the database
    $sql_insert_vendor = "INSERT INTO vendor (vendor_email, vendor_firstname, vendor_surname, vendor_phone) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql_insert_vendor);
    mysqli_stmt_bind_param($stmt, "ssss", $vendor_email, $vendor_firstname, $vendor_surname, $vendor_phone);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
      echo "Vendor added successfully!";
    } else {
      echo "An error occurred while adding the vendor. Please try again!";
    }
  }

  mysqli_stmt_close($stmt);
} else {
  echo "Invalid request";
}

mysqli_close($link);
?>
