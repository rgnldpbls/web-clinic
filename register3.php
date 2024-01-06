<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/register.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  </head>
  <body>
    <div class="register">
      <img class="bg-pic-icon" alt="" src="assets/bg-pic@2x.png" />
      <div class="base"></div>
      <div class="logo-parent">
        <img class="logo-icon" alt="" src="assets/logo@2x.png" />
        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
      <div class="registration">Registration</div>
      <div class="register-child"></div>
      <form action="register.php" method="post" enctype="multipart/form-data">
        <input class="register-item" type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage(event)"/>
        <div class="upload-your-picture"><img id="preview-image" alt="Preview" /></div>
        <button type="submit" class="rectangle-parent" name="next">
          <div class="group-child"></div>
          <div class="next">Next</div>
        </button>
    <?php 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get file data
        include 'dbconfig.php';
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
    
        // Insert image data into the database
        $sql = "INSERT INTO sample (pic) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("b", $imageData);
        $stmt->execute();
        $stmt->close();
    
        echo "Image uploaded and inserted into the database successfully.";
    }
    ?>
  </form>
      <img class="register-inner" alt="" src="assets/arrow-1.svg" />
      <img class="polygon-icon" alt="" src="assets/polygon-1@2x.png" />
      <script src="script/script.js"></script>
    </div>
  </body>
</html>
