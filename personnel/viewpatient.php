<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Patients</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/viewpatient.css" />
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
        $persId = $_SESSION['persId'];
        $query = "SELECT patient_Name, appoint_Info, appoint_Date, appoint_Time, appoint_Status
        FROM appointment app JOIN patient p ON app.patient_Id = p.patient_Id
        WHERE pers_Id = '$persId'
        ORDER BY appoint_Date DESC";
        $result = mysqli_query($conn, $query);
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
          <tr>
            <th class="th">
              <div class="appointments3">Patient Name</div>
            </th>
            <th class="th">
              <div class="appointments3">Appointment Info</div>
            </th>
            <th class="th">
              <div class="appointments3">Date</div>
            </th>
            <th class="th">
              <div class="appointments3">Time</div>
            </th>
            <th class="th">
              <div class="appointments3">Status</div>
            </th>
            <th class="th">
              <div class="appointments3"></div>
            </th>
          </tr>
          <?php 
              while($rows = mysqli_fetch_assoc($result)){
                $appStatus = $rows['appoint_Status'];
                echo '<tr>';
                echo '<td class="th1">' . $rows['patient_Name']. '</td>';
                echo '<td class="th1">' . $rows['appoint_Info']. '</td>';
                echo '<td class="th1">' . $rows['appoint_Date']. '</td>';
                echo '<td class="th1">' . $rows['appoint_Time']. '</td>';
                echo '<td class="th1">' . $appStatus. '</td>';
                if($appStatus == 'Approved'){
                  echo '<td class="th1">' . '<button>View</button>'. '</td>';
                }
                else{
                  echo '<td class="th1"></td>';
                }
                echo '</tr>';
              }
          ?>
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
