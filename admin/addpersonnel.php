<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/addpersonnel.css" />
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
        $name = $_SESSION['adminName'];
        if (isset($_POST['logoutBTN'])) {      
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
    ?>
    <div class="admin-dashboard-personnel-add">
      <div class="base1"></div>
      <div class="base-main-header"></div>
      <div class="base-main"></div>
      <div class="sidebar-container1">
        <div class="sidebar1"></div>
        <img class="bg-pic-icon1" alt="" src="public/bg-pic@2x.png" />
        <button class="dashboard3" type="button" onclick="dbPage()">
          <div class="dashboard4">Dashboard</div>
          <img
            class="dashboard-icon1"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
        <button class="personnel1" type="button" onclick="selfPage()">
          <div class="appointments1">Personnel</div>
          <img class="icons-8-11" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="sql-problems1" type="button" onclick="sqlprobPage()">
          <div class="book-an-appointment1">SQL Problems</div>
          <img class="icon-qmark1" alt="" src="public/iconqmark@2x.png" />
        </button>
      </div>
      <div class="header1">
        <img class="logo-icon1" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment1">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila1">Sta. Mesa, Manila</div>
      </div>
      <input class="welcome-fn-mi1" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
      <div class="footer">
        <div class="footer-child"></div>
        <div class="bsit-3-2n-group1">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at1">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
    <form method="post">
      <button class="logout" type="submit" name="logoutBTN">
        <div class="logout-child"></div>
        <div class="logout1">Logout</div>
      </button>
    </form>
      <div class="header2">
        <div class="personnel2">Personnel</div>
        <div class="header-child"></div>
      </div>
      <div class="header3">
        <div class="add-new-personnel">Add New Personnel</div>
        <div class="header-child"></div>
      </div>
      <button class="confirmbtn">
        <div class="confirmbtn-child"></div>
        <div class="confirm">Confirm</div>
      </button>
      <div class="admin-dashboard-title2">
        <div class="admin-dashboard1">Admin Dashboard</div>
        <div class="admin-dashboard-title-inner"></div>
      </div>
      <div class="admin-dashboard-personnel-add-child"></div>
      <div class="patient-email">
        <div class="personnel-email">Personnel Email</div>
        <input class="patient-email-child" type="email" />
      </div>
      <div class="patient-password">
        <div class="personnel-email">Personnel Password</div>
        <input class="patient-email-child" type="text" />
      </div>
      <div class="full-name-parent">
        <div class="full-name1">
          <div class="full-name2">Full Name</div>
          <input class="patient-email-child" type="text" />
        </div>
        <div class="contact-number">
          <div class="personnel-email">Contact Number</div>
          <input class="contact-number-child" type="number" />
        </div>
        <div class="sex">
          <div class="sex1">Sex</div>
          <div class="male">Male</div>
          <input class="sex-child" type="radio" />

          <div class="female">Female</div>
          <input class="sex-item" type="radio" />
        </div>
        <div class="birthdate">
          <div class="birthdate-mmddyyyy">Birthdate (MM/DD/YYYY)</div>
          <input class="contact-number-child" type="date" />
        </div>
        <div class="patient-type1">
          <div class="personnel-type">Personnel Type</div>
          <input class="patient-type-item" type="text" />
        </div>
      </div>
    </div>
    <script>
        function dbPage(){
            window.location.href = 'index.php';
        }
        function selfPage(){
            window.location.href = 'addpersonnel.php';
        }
        function sqlprobPage(){
            window.location.href = '#';
        }
    </script>
  </body>
</html>
