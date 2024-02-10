<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Admin Dashboard</title>
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
        $id = $_SESSION['adminId'];
        $name = $_SESSION['adminName'];
        $email = $_SESSION['adminEmail'];
        $password = $_SESSION['adminPass'];
        if (isset($_POST['logoutBTN'])) {      
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
    ?>
    <div class="admin-dashboard-dashboard">
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
        <button class="personnel" type="button" onclick="addPersonnelPage()">
          <div class="appointments">Personnel</div>
          <img class="icons-8-1" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="sql-problems" type="button" onclick="sqlprobPage()">
          <div class="book-an-appointment">SQL Problems</div>
          <img class="icon-qmark" alt="" src="public/iconqmark@2x.png" />
        </button>
      </div>
      <div class="admin-dashboard-title">
        <div class="admin-dashboard">Admin Dashboard</div>
        <div class="admin-dashboard-title-child"></div>
      </div>
      <div class="header">
        <img class="logo-icon" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
      <div class="admin-dashboard-dashboard-child"></div>
      <div class="admin-dashboard-dashboard-item"></div>
      <div class="admin-dashboard-dashboard-inner"></div>
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
      <div class="admin-dashboard-title1">
        <div class="dashboard2">Dashboard</div>
        <div class="admin-dashboard-title-item"></div>
      </div>
      <div class="admin-email">
        <div class="admin-email1">Admin Email</div>
        <input class="admin-email-child" type="email" value="<?php echo $email;?>" disabled/>
      </div>
      <div class="admin-password">
        <div class="admin-email1">Admin Password</div>
        <input class="admin-email-child" type="password" value="<?php echo $password;?>" disabled/>
      </div>
      <div class="admin-name">
        <div class="full-name">
          <div class="admin-name1">Admin Name</div>
          <input class="admin-email-child" type="text" value="<?php echo $name;?>" disabled/>
        </div>
      </div>
      <div class="patient-type-wrapper">
        <div class="patient-type">
          <div class="admin-id">Admin ID</div>
          <input class="patient-type-child" type="text" value="<?php echo $id;?>" disabled/>
        </div>
      </div>
      <input class="welcome-fn-mi" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    </div>
    <script>
        function selfPage(){
            window.location.href = 'index.php';
        }
        function addPersonnelPage(){
            window.location.href = 'addpersonnel.php';
        }
        function sqlprobPage(){
            window.location.href = 'probindx.php';
        }
    </script>
  </body>
</html>
