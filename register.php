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
      <a href="register2.html" class="rectangle-parent">
        <div class="group-child"></div>
        <div class="next">Next</div>
      </a>
      <div class="full-name">
        <div class="full-name1">Full Name<span style="color:red">*</span></div>
        <input class="full-name-child" type="text"/>
      </div>
      <div class="emergency-contact-number">
        <div class="emergency-contact-number1">Emergency Contact Number</div>
        <input class="full-name-child" type="number" />
      </div>
      <div class="emergency-contact-name">
        <div class="emergency-contact-name1">Emergency Contact Name</div>
        <input class="full-name-child" type="text" />
      </div>
      <div class="patient-email">
        <div class="patient-email1">Patient Email</div>
        <input class="full-name-child" type="email" />
      </div>
      <div class="patient-password">
        <div class="patient-email1">Patient Password</div>
        <input class="full-name-child" type="password" name="password"
          id="password"/>
        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
      </div>
      <div class="patient-type">
        <div class="patient-type1">Patient Type</div>
        <div class="patient-type-child"></div>
      </div>
      <select class="patient-type2" id="patientType" name="patientType">
        <option value="Student">Student</option>
        <option value="Faculty">Faculty</option>
      </select>
      <div class="department">
        <div class="patient-type1">Department</div>
        <input class="department-child" type="text" />
      </div>
      <div class="contact-number">
        <div class="patient-email1">Contact Number</div>
        <input class="contact-number-child" type="number" />
      </div>
      <div class="blood-type">
        <div class="patient-email1">Blood Type</div>
        <input class="blood-type-child" type="text" />
      </div>
      <div class="address">
        <div class="full-name1">Address</div>
        <input class="full-name-child" type="text" />
      </div>
      <div class="age">
        <div class="age1">Age</div>
        <input class="age-child" type="number" />
      </div>
      <div class="sex">
        <div class="sex1">Sex</div>
        <div class="male">Male</div>
        <input class="sex-child" type="radio" id="male" name="sex" value="male" checked/>

        <div class="female">Female</div>
        <input class="sex-item" type="radio" id="female" name="sex" value="female"/>
      </div>
      <div class="city">
        <div class="city1">City</div>
        <input class="city-child" type="text" />
      </div>
      <div class="birthdate">
        <div class="birthdate-mmddyyyy">Birthdate</div>
        <input class="birthdate-child" type="date" />
      </div>
      <input class="register-item" type="file" id="imageInput" accept="image/*" onchange="previewImage(event)"/>

      <div class="upload-your-picture"><img id="preview-image" alt="Preview" /></div>
      <img class="register-inner" alt="" src="assets/arrow-1.svg" />

      <img class="polygon-icon" alt="" src="assets/polygon-1@2x.png" />
      <script src="script/script.js"></script>
    </div>
  </body>
</html>
