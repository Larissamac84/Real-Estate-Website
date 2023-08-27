<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Manage Vendors</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div id="container">
  <?php include("includes/header.html");?>
  <?php include("includes/nav.html");?>

  <main>
  
  <?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $vendor_email = $_POST["vendor_email"];
  $vendor_firstname = $_POST["vendor_firstname"];
  $vendor_surname = $_POST["vendor_surname"];
  $vendor_phone = $_POST["vendor_phone"];

  $sql_check_vendor = "SELECT * FROM vendor WHERE vendor_email = ?";
  $stmt_check_vendor = mysqli_prepare($link, $sql_check_vendor);
  mysqli_stmt_bind_param($stmt_check_vendor, "s", $vendor_email);
  mysqli_stmt_execute($stmt_check_vendor);
  $result_check_vendor = mysqli_stmt_get_result($stmt_check_vendor);

  if (mysqli_num_rows($result_check_vendor) > 0) {
    // Existing vendor found, update the vendor details
    $sql_update_vendor = "UPDATE vendor SET vendor_firstname = ?, vendor_surname = ?, vendor_phone = ? WHERE vendor_email = ?";
    $stmt_update_vendor = mysqli_prepare($link, $sql_update_vendor);
    mysqli_stmt_bind_param($stmt_update_vendor, "ssss", $vendor_firstname, $vendor_surname, $vendor_phone, $vendor_email);
    if (mysqli_stmt_execute($stmt_update_vendor)) {
      echo "<h3>Vendor Updated!</h3>";
      echo "<a href='managevendors.php'>Return to Vendor Admin</a>";
    } else {
      echo "An error occurred while updating the vendor. Please try again!";
    }

    mysqli_stmt_close($stmt_update_vendor);
  } else {
    // New vendor, insert into the database
    $sql_insert_vendor = "INSERT INTO vendor (vendor_email, vendor_firstname, vendor_surname, vendor_phone) VALUES (?, ?, ?, ?)";
    $stmt_insert_vendor = mysqli_prepare($link, $sql_insert_vendor);
    mysqli_stmt_bind_param($stmt_insert_vendor, "ssss", $vendor_email, $vendor_firstname, $vendor_surname, $vendor_phone);
    if (mysqli_stmt_execute($stmt_insert_vendor)) {
      echo "<h3>Vendor Added!</h3>";
      echo "<a href='managevendors.php'>Return to Vendor Admin</a>";
    } else {
      echo "An error occurred while adding the vendor. Please try again!";
    }

    mysqli_stmt_close($stmt_insert_vendor);
  }

  mysqli_stmt_close($stmt_check_vendor);
} else {
  echo "Invalid request.";
}

mysqli_close($link);
?>

  </main>

  <?php include("includes/footer.html");?>
</div>
</body>
</html>

