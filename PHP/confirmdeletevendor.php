<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Confirm Delete Vendor</title>
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

      if (isset($_GET["vendor_email"])) {
        $vendor_email = $_GET["vendor_email"];

        $sql = "SELECT * FROM vendor WHERE vendor_email = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $vendor_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if ($row) {
          echo "<h3>Confirm Delete Vendor</h3>";
          echo "<p>Are you sure you want to delete the following vendor?</p>";
          echo "<table>";
          echo "<tr><th>Email</th><th>Name</th><th>Surname</th><th>Phone</th></tr>";
          echo "<tr>";
          echo "<td>" . $row["vendor_email"] . "</td>";
          echo "<td>" . $row["vendor_firstname"] . "</td>";
          echo "<td>" . $row["vendor_surname"] . "</td>";
          echo "<td>" . $row["vendor_phone"] . "</td>";
          echo "</tr>";
          echo "</table>";

          echo "<br>";
          echo "<a href='deletevendor.php?vendor_email=" . $row["vendor_email"] . "'>Confirm Delete</a>";
          echo "<p></p>";
          echo "<a href='managevendors.php'>Cancel</a>";
        } else {
          echo "The vendor does not exist.";
        }

        mysqli_stmt_close($stmt);
      } else {
        echo "No vendor email provided.";
      }

      mysqli_close($link);
      ?>
    </main>

    <?php include("includes/footer.html");?>
  </div>
</body>
</html>
