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
        <!-- <input class="register-item" type="file" id="imageInput" accept="image/*" onchange="previewImage(event)" name="image"/>
        <div class="upload-your-picture"><img id="preview-image" alt="Preview" /></div> -->
        <div class="full-name">
          <div class="full-name1">Full Name<span style="color:red">*</span></div>
          <input class="full-name-child" type="text" name="fullName" required/>
        </div>
        <div class="address">
          <div class="full-name1">Address<span style="color:red">*</span></div>
          <input class="full-name-child" type="text" name="address" required/>
        </div>
        <div class="city">
          <div class="city1">City<span style="color:red">*</span></div>
          <input class="city-child" type="text" name="city" required/>
        </div>
        <div class="birthdate">
          <div class="birthdate-mmddyyyy">Birthdate<span style="color:red">*</span></div>
          <input class="birthdate-child" type="date" name="birthDate" required/>
        </div>
        <div class="age">
          <div class="age1">Age<span style="color:red">*</span></div>
          <input class="age-child" type="number" name="age" required/>
        </div>
        <div class="sex">
          <div class="sex1">Sex<span style="color:red">*</span></div>
          <div class="male">Male</div>
          <input class="sex-child" type="radio" id="male" name="sex" value="male" checked/>
          <div class="female">Female</div>
          <input class="sex-item" type="radio" id="female" name="sex" value="female"/>
        </div>
        <div class="contact-number">
          <div class="patient-email1">Contact Number<span style="color:red">*</span></div>
          <input class="contact-number-child" type="number" name="contactNumber" required/>
        </div>
        <div class="blood-type">
          <div class="patient-email1">Blood Type<span style="color:red">*</span></div>
          <input class="blood-type-child" type="text" name="bloodType" required/>
        </div>
        <div class="patient-type">
          <div class="patient-type1">Patient Type<span style="color:red">*</span></div>
          <div class="patient-type-child"></div>
        </div>
        <select class="patient-type2" id="patientType" name="patientType" required>
          <option value="Student">Student</option>
          <option value="Faculty">Faculty</option>
        </select>
        <div class="department">
          <div class="patient-type1">Department<span style="color:red">*</span></div>
          <input class="department-child" type="text" name="department" required/>
        </div>
        <div class="emergency-contact-name">
          <div class="emergency-contact-name1">Emergency Contact Name<span style="color:red">*</span></div>
          <input class="full-name-child" type="text" name="contactName" required/>
        </div>
        <div class="emergency-contact-number">
          <div class="emergency-contact-number1">Emergency Contact Number<span style="color:red">*</span></div>
          <input class="full-name-child" type="number" name="contactNo" required />
        </div>
        <div class="patient-email">
          <div class="patient-email1">Patient Email<span style="color:red">*</span></div>
          <input class="full-name-child" type="email" name="email" required/>
        </div>
        <div class="patient-password">
          <div class="patient-email1">Patient Password<span style="color:red">*</span></div>
          <input class="full-name-child" type="password" name="password" id="password" required/>
          <i class="fas fa-eye password-toggle" id="togglePassword"></i>
        </div>
        <button type="submit" class="rectangle-parent" name="next">
          <div class="group-child"></div>
          <div class="next">Next</div>
        </button>
    <?php 
      function newUser(){
        include 'dbconfig.php';
        // Patient Picture
        // $targetFile = $_FILES["image"]["tmp_name"];
        // $imageData = file_get_contents($targetFile);
        // $encodedImageData = base64_encode($imageData);
        // Other patient data
        $name = $_POST['fullName'];
        $address = $_POST['address'];
        $city = $_POST['city'];     
        $birthDate = $_POST['birthDate'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $contactNumber = $_POST['contactNumber'];
        $bloodType = $_POST['bloodType'];
        $patientType = $_POST['patientType'];
        $department = $_POST['department'];
        $emerContactName = $_POST['contactName'];
        $emerContactNum = $_POST['contactNo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dateCreated = date("Y-m-d");
        $medHistId = LAST_INSERT_ID();
        $sql = "INSERT INTO patient(patient_Name, patient_Address, patient_City, patient_Age, patient_Birthdate, patient_Sex, patient_ContactNo, blood_Type, patient_Type, department, patient_Email, patient_Password, emer_ContactName, emer_ContactNo, pat_DateCreated)
        VALUES ('$name', '$address', '$city', '$age', '$birthDate', '$sex', '$contactNumber', '$bloodType', '$patientType', '$department', '$email', '$password', '$emerContactName', '$emerContactNum', '$dateCreated')";
        if(mysqli_query($conn, $sql)){
          header("Location: register2.php");
        }else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
      function checkEmail(){
        include 'dbconfig.php';
        $email = $_POST['email'];
        $sql = "SELECT * FROM patient WHERE patient_Email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=0){
          echo"<b><br>Email already exists!!";
        }else if(isset($_POST['next'])){
          newUser();
        }
      }
      if(isset($_POST['next'])){
        if(!empty($_POST['fullName']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['birthDate']) && !empty($_POST['age']) && !empty($_POST['sex']) && !empty($_POST['contactNumber']) && !empty($_POST['bloodType'])
          && !empty($_POST['patientType']) && !empty($_POST['department']) && !empty($_POST['contactName']) && !empty($_POST['contactNo']) && !empty($_POST['email']) && !empty($_POST['password'])){
            checkEmail();
        }
      }
    ?>
  </form>
      <img class="register-inner" alt="" src="assets/arrow-1.svg" />
      <img class="polygon-icon" alt="" src="assets/polygon-1@2x.png" />
      <script src="script/script.js"></script>
    </div>
  </body>
</html>
