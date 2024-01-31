<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/appointment.css" />
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
        if (isset($_POST['logoutBTN'])) {      
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
    ?>
    <div class="personnel-dashboard-appointmen">
      <div class="base"></div>
      <div class="sidebar-container">
        <div class="sidebar"></div>
        <img class="bg-pic-icon" alt="" src="public/bg-pic@2x.png" />
        <button class="dashboard" type="button" onclick="dbPage()">
          <div class="dashboard1">Dashboard</div>
          <img
            class="dashboard-icon"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
        <button class="appointments" type="button" onclick="selfPage()">
          <div class="dashboard1">Appointments</div>
          <img
            class="appointments-icon"
            alt=""
            src="public/appointmentsicon@2x.png"
          />
        </button>
        <button class="transactions" type="button" onclick="transactPage()">
          <div class="transactions1">Transactions</div>
          <img
            class="transactions-icon"
            alt=""
            src="public/transactionsicon@2x.png"
          />
        </button>
        <button class="patients" type="button" onclick="viewPatientPage()">
          <div class="book-an-appointment">Patients</div>
          <img class="patient-icon" alt="" src="public/patienticon@2x.png" />
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
      <div class="personnel-dashboard-appointmen-child"></div>
      <div class="base-main-header"></div>
      <div class="base-main"></div>
      <input class="welcome-fn-mi" type="text" value="<?php echo "Welcome, $name";?>" disabled/>

      <div class="footer">
        <div class="footer-child"></div>
        <div class="bsit-3-2n-group">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at">
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
      <div class="header1">
        <div class="appointments2">Appointments</div>
        <div class="header-child"></div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th class="th">
              <div class="appointments3">Appointments</div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="th"></td>
          </tr>
          <tr></tr>
        </tbody>
      </table>
    </div>
    <script>
        function dbPage(){
        window.location.href = 'index.php';
      }
      function selfPage(){
        window.location.href = 'appointment.php';
      }
       function viewPatientPage(){
         window.location.href = 'viewpatient.php';
       }
      function transactPage(){
        window.location.href = 'transaction.php';
      }
    </script>
  </body>
</html>
