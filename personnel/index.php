<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Dashboard</title>
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
        include '../dbconfig.php';
        session_start();
        if (!isset($_SESSION['loginVisit']) || $_SESSION['loginVisit'] !== true) {
          header("Location: ../login.php");
          exit();
        }
        $name = $_SESSION['fullName'];
        $birthdate = $_SESSION['birthDate'];
        $sex = $_SESSION['sex'];
        $type = $_SESSION['type'];
        $contactNo = $_SESSION['contactNum'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        if (isset($_POST['logoutBTN'])) {      
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
    ?>
    <div class="personnel-dashboard-dashboard">
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
        <button class="appointments" type="button" onclick="#">
          <div class="dashboard1">Appointments</div>
          <img
            class="appointments-icon"
            alt=""
            src="public/appointmentsicon@2x.png"
          />
        </button>
        <button class="patients" type="button" onclick="#">
          <div class="book-an-appointment">Patients</div>
          <img class="patient-icon" alt="" src="public/patienticon@2x.png" />
        </button>
        <button class="transactions" type="button" onclick="#">
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
        <div class="personnel-dashboard">Personnel Dashboard</div>
        <div class="patient-dashboard-title-child"></div>
      </div>
      <div class="personnel-dashboard-dashboard-child"></div>
      <div class="personnel-dashboard-dashboard-item"></div>
      <div class="personnel-dashboard-dashboard-inner"></div>
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
      <div class="patient-email">
        <div class="personnel-email">Personnel Email</div>
        <input class="patient-email-child" type="email" value="<?php echo $email;?>" disabled/>
      </div>
      <div class="patient-password">
        <div class="personnel-email">Personnel Password</div>
        <input class="patient-email-child" type="password" value="<?php echo $password;?>" disabled/>
      </div>
      <div class="contact-number">
        <div class="contact-number1">Contact Number</div>
        <input class="contact-number-child" type="text" value="<?php echo $contactNo;?>" disabled/>
      </div>
      <div class="full-name-parent">
        <div class="full-name">
          <div class="full-name1">Full Name</div>
          <input class="patient-email-child" type="text" value="<?php echo $name;?>" disabled/>
        </div>
        <div class="sex">
          <div class="sex1">Sex</div>
          <div class="male">Male</div>
          <input class="sex-child" type="radio" value="male" <?php echo($sex === "male") ? 'checked' : '';?> disabled/>

          <div class="female">Female</div>
          <input class="sex-item" type="radio" value="female" <?php echo($sex === "female") ? 'checked' : '';?> disabled/>
        </div>
        <div class="birthdate">
          <div class="birthdate-mmddyyyy">Birthdate (MM/DD/YYYY)</div>
          <input class="birthdate-child" type="text" value="<?php echo $birthdate;?>" disabled/>
        </div>
        <div class="patient-type">
          <div class="personnel-type">Personnel Type</div>
          <input class="patient-type-child" type="text" value="<?php echo $type;?>" disabled/>
        </div>
      </div>
      <input class="welcome-fn-mi" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    </div>
    <script>
      function selfPage(){
        window.location.href = 'index.php';
      }
    //   function viewAppointPage(){
    //     window.location.href = 'viewappointment.php';
    //   }
    //   function bookPage(){
    //     window.location.href = 'booking.php';
    //   }
    //   function transactPage(){
    //     window.location.href = 'transaction.php';
    //   }
    </script>
  </body>
</html>
