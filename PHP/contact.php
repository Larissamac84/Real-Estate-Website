<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .map-container {
      width: 300px;
      height: 300px;
      margin: 0 auto;
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }
    
    .map-container iframe {
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>
</head>
<body>
  <div id="container">
    <?php include("includes/header.html"); ?>
    <?php include("includes/nav.html"); ?>
    <main>
      <h1>Contact</h1>

      <h2>Location</h2>
      <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152515.36595448406!2d-6.410508300859311!3d53.32441163085005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e80ea27ac2f%3A0xa00c7a9973171a0!2sDublin!5e0!3m2!1sen!2sie!4v1684250382524!5m2!1sen!2sie" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <h2>Contact Information</h2>
      <p>Email: example@example.com</p>
      <p>Phone: 123-456-7890</p>

      <h2>Departments</h2>
      <ul>
        <li>Sales Department : 33 Main St, Dublin</li>

      </ul>
    </main>
    <?php include("includes/footer.html"); ?>
  </div><!-- Close the container div-->
</body>
</html>
