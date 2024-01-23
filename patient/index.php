<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Questrial:wght@400&display=swap"
    />
  </head>
  <body>
    <?php 
        session_start();
        if (!isset($_SESSION['loginVisit']) || $_SESSION['loginVisit'] !== true) {
          header("Location: ../login.php");
          exit();
        }
        $name = $_SESSION['fullname'];
        $address = $_SESSION['address'];
        $city = $_SESSION['city'];
        $birthDate = $_SESSION['birthDate'];
        $sex = $_SESSION['sex'];
        $age = $_SESSION['age'];
        $contactNo =  $_SESSION['contactNum'];
        $bloodType = $_SESSION['bType'];
        $patientType = $_SESSION['pType'];
        $department = $_SESSION['dept'];
        $emerName =  $_SESSION['emerName'];
        $emerNo = $_SESSION['emerNo'];
        $email =  $_SESSION['email'];
        $password = $_SESSION['password'];
        $medAttention = $_SESSION['medAttention'];
        $medIllness = $_SESSION['medIllness'];
        $allerFood =  $_SESSION['allergyFood'];
        $allerMed =  $_SESSION['allergyMed'];
        $smoking = $_SESSION['smoking'];
        $alcohol = $_SESSION['alcohol'];
        if (isset($_POST['logoutBTN'])) {      
          session_destroy();
          header("Location: ../login.php");
          exit();
      }
    ?>
    <div class="patient-dashboard-dashboard">
      <div class="base"></div>
      <div class="sidebar-container">
        <div class="sidebar"></div>
        <img class="bg-pic-icon" alt="" src="public/bg-pic@2x.png" />

        <button class="dashboard" type="button" onclick="selfPage()">
          <div class="dashboard1">Dashboard</div>
          <img
            class="dashboard-icon"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
        <button class="appointments">
          <div class="dashboard1">Appointments</div>
          <img
            class="appointments-icon"
            alt=""
            src="public/appointmentsicon@2x.png"
          />
        </button>
        <button class="book-an-appointment" type="button" onclick="bookPage()">
          <div class="book-an-appointment1">Book an Appointment</div>
          <img class="book-icon" alt="" src="public/bookicon@2x.png" />
        </button>
        <button class="transactions">
          <div class="transactions1">Transactions</div>
          <img
            class="transactions-icon"
            alt=""
            src="public/transactionsicon@2x.png"
          />
        </button>
      </div>
      <div class="header">
        <img class="logo-icon" alt="" src="public/logo@2x.png" />

        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
      <div class="patient-dashboard-title">
        <div class="patient-dashboard">Patient Dashboard</div>
        <div class="patient-dashboard-title-child"></div>
      </div>
      <div class="patient-dashboard-dashboard-child"></div>
      <div class="patient-dashboard-dashboard-item"></div>
      <div class="patient-dashboard-dashboard-inner"></div>
      <div class="rectangle-parent">
        <div class="group-child"></div>
        <div class="bsit-3-2n-group">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <form method="post">
        <button class="rectangle-group" type="submit" name="logoutBTN">
          <div class="group-item"></div>
          <div class="patient">Logout</div>
        </button>
      </form>
      <div class="patient-dashboard-title1">
        <div class="dashboard2">Dashboard</div>
        <div class="patient-dashboard-title-item"></div>
      </div>
      <div class="full-name">
        <div class="medical-illness">Full Name</div>
        <input class="full-name-child" type="text" value="<?php echo $name;?>" disabled/>
      </div>
      <div class="emergency-contact-number">
        <div class="emergency-contact-number1">Emergency Contact Number</div>
        <input class="full-name-child" type="text" value="<?php echo $emerNo;?>" disabled/>
      </div>
      <div class="emergency-contact-name">
        <div class="emergency-contact-name1">Emergency Contact Name</div>
        <input class="full-name-child" type="text" value="<?php echo $emerName;?>" disabled/>
      </div>
      <div class="patient-email">
        <div class="patient-email1">Patient Email</div>
        <input class="full-name-child" type="text" value="<?php echo $email;?>" disabled/>
      </div>
      <div class="patient-password">
        <div class="patient-email1">Patient Password</div>
        <input class="full-name-child" type="password" value="<?php echo $password?>" disabled/>
      </div>
      <div class="patient-type">
        <div class="patient-type1">Patient Type</div>
        <input class="patient-type-child" type="text" value="<?php echo $patientType;?>" disabled/>
      </div>
      <div class="department">
        <div class="patient-type1">Department</div>
        <input class="patient-type-child" type="text" value="<?php echo $department;?>" disabled/>
      </div>
      <div class="contact-number">
        <div class="patient-email1">Contact Number</div>
        <input class="contact-number-child" type="text" value="<?php echo $contactNo;?>" disabled/>
      </div>
      <div class="blood-type">
        <div class="patient-email1">Blood Type</div>
        <input class="blood-type-child" type="text" value="<?php echo $bloodType;?>" disabled/>
      </div>
      <div class="address">
        <div class="medical-illness">Address</div>
        <input class="full-name-child" type="text" value="<?php echo $address;?>" disabled/>
      </div>
      <div class="age">
        <div class="age1">Age</div>
        <input class="age-child" type="text" value="<?php echo $age;?>" disabled/>
      </div>
      <div class="sex">
        <div class="sex1">Sex</div>
        <div class="male">Male</div>
        <input class="sex-child" type="radio" value="male" <?php echo($sex === "male") ? 'checked' : '';?>/>
        <div class="female">Female</div>
        <input class="sex-item" type="radio" value ="female" <?php echo($sex === "female") ? 'checked' : ''?>/>
      </div>
      <div class="city">
        <div class="city1">City</div>
        <input class="city-child" type="text" value="<?php echo $city;?>" disabled/>
      </div>
      <div class="birthdate">
        <div class="birthdate-mmddyyyy">Birthdate (YYYY-MM-DD)</div>
        <input class="birthdate-child" type="text" value="<?php echo $birthDate;?>" disabled/>
      </div>
      <div class="address2">
        <div class="medical-illness">Medical Illness</div>
        <input class="full-name-child" type="text" value="<?php echo $medIllness?>" disabled/>
      </div>
      <div class="needs-medical-attention">
        <div class="yes">Yes</div>
        <input class="needs-medical-attention-child" type="radio" value="yes" <?php echo($medAttention === "yes") ? 'checked' : ''?>/>

        <div class="no">No</div>
        <input class="needs-medical-attention-item" type="radio" value="no" <?php echo($medAttention === "no") ? 'checked': ''?>/>

        <div class="any-history-of">Needs Medical Attention?</div>
      </div>
      <div class="needs-medical-attention2">
        <div class="yes">Yes</div>
        <input class="needs-medical-attention-child" type="radio" value="yes" <?php echo($smoking === "yes") ? 'checked' : ''?>/>

        <div class="no">No</div>
        <input class="needs-medical-attention-item" type="radio" value="no" <?php echo($smoking === "no") ? 'checked' : ''?>/>

        <div class="any-history-of">Any history of Smoking?</div>
      </div>
      <div class="needs-medical-attention3">
        <div class="yes">Yes</div>
        <input class="needs-medical-attention-child" type="radio" value="yes" <?php echo($alcohol === "yes") ? 'checked' : ''?> />

        <div class="no">No</div>
        <input class="needs-medical-attention-item" type="radio" value="no" <?php echo($alcohol === "no") ? 'checked' : ''?>/>

        <div class="any-history-of">Drinking Alcohol?</div>
      </div>
      <div class="allergies-in-food">
        <div class="medical-illness">Allergies in Food</div>
        <input class="full-name-child" type="text" value="<?php echo $allerFood;?>" disabled/>
      </div>
      <div class="allergies-in-medicine">
        <div class="medical-illness">Allergies in Medicine</div>
        <input class="full-name-child" type="text" value="<?php echo $allerMed;?>" disabled/>
      </div>
      <input class="welcome-fn-mi" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    </div>
    <script>
      function selfPage(){
        window.location.href = 'index.php';
      }
      function bookPage(){
        window.location.href = 'booking.php';
      }
    </script>
  </body>
</html>
