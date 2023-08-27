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
    <h3>Manage Vendors</h3>
    <p><a href="addvendor.php">Add new vendor</a></p>

    <?php
    require 'connect.php';

    $sql = "SELECT * FROM vendor";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Telephone</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>";

      while ($row = mysqli_fetch_assoc($result)) {
        $vendor_email = $row["vendor_email"];
        $vendor_firstname = $row["vendor_firstname"];
        $vendor_surname = $row["vendor_surname"];
        $vendor_phone = $row["vendor_phone"];

        echo "<tr>
                <td>$vendor_email</td>
                <td>$vendor_firstname</td>
                <td>$vendor_surname</td>
                <td>$vendor_phone</td>
                <td><a href='editvendor.php?vendor_email=$vendor_email'>Edit</a></td>
                <td><a href='confirmdeletevendor.php?vendor_email=$vendor_email' onclick=\"return confirm('Are you sure you want to delete this vendor?');\">Delete</a></td>
              </tr>";
      }

      echo "</table>";
    } else {
      echo "There are no vendors to display";
    }

    mysqli_close($link);
    ?>
  </main>

  <?php include("includes/footer.html");?>
</div>
</body>
</html>
