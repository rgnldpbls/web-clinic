<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Transaction</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/transaction.css" />
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
        $query = "SELECT patient_Name, form_Type, date_Validity, date_Issued, place_Issued, transact_Status, claimed, patient_Rel
        FROM transaction tr JOIN appointment app ON tr.appoint_No = app.appoint_No JOIN patient p ON app.patient_Id = p.patient_Id
        WHERE app.pers_Id = '$persId'
        ORDER BY app.appoint_Date DESC";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="patient-dashboard-transactions">
      <div class="base1"></div>
      <div class="sidebar-container1">
        <div class="sidebar1"></div>
        <img class="bg-pic-icon1" alt="" src="public/bg-pic@2x.png" />

        <button class="dashboard2" type="button" onclick="dbPage()">
          <div class="dashboard3">Dashboard</div>
          <img
            class="dashboard-icon1"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
        <button class="appointments2" type="button" onclick="viewAppointPage()">
          <div class="dashboard3">Appointments</div>
          <img
            class="appointments-icon1"
            alt=""
            src="public/appointmentsicon@2x.png"
          />
        </button>
        <button class="book-an-appointment3" type="button" onclick="viewPatientPage()">
          <div class="book-an-appointment4">Patients</div>
          <img class="book-icon1" alt="" src="./public/patienticon@2x.png" />
        </button>
        <button class="transactions2" type="button" onclick="selfPage()">
          <div class="transactions3">Transactions</div>
          <img
            class="transactions-icon1"
            alt=""
            src="public/transactionsicon@2x.png"
          />
        </button>
      </div>
      <div class="header2">
        <img class="logo-icon1" alt="" src="public/logo@2x.png" />

        <div class="pup-clinic-appointment1">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila1">Sta. Mesa, Manila</div>
      </div>
      <div class="patient-dashboard-title1">
        <div class="patient-dashboard1">Personnel Dashboard</div>
        <div class="patient-dashboard-title-item"></div>
      </div>
      <div class="patient-dashboard-transactions-child"></div>
      <div class="base-main-header1"></div>
      <div class="base-main1"></div>
      <input class="welcome-fn-mi1" type="text" value="<?php echo "Welcome, $name";?>" disabled/>

      <div class="footer1">
        <div class="footer-item"></div>
        <div class="bsit-3-2n-group1">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at1">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <form method="post">
        <button class="logout2" type="submit" name="logoutBTN">
            <div class="logout-item"></div>
            <div class="logout3">Logout</div>
        </button>
      </form>
      <div class="header3">
        <div class="transactions4">Transactions</div>
        <div class="header-item"></div>
      </div>
      <table class="table">
          <tr>
            <th class="th">
              <div class="transactions5">Patient Name</div>
            </th>
            <th class="th">
              <div class="transactions5">Form Type</div>
            </th>
            <th class="th">
              <div class="transactions5">Date Issued</div>
            </th>
            <th class="th">
              <div class="transactions5">Place Issued</div>
            </th>
            <th class="th">
              <div class="transactions5">Form Validity</div>
            </th>
            <th class="th">
              <div class="transactions5">Status</div>
            </th>
            <th class="th">
              <div class="transactions5">Claimed By</div>
            </th>
            <th class="th">
              <div class="transactions5">Relationship</div>
            </th>
          </tr>
          <?php 
            while($rows = mysqli_fetch_assoc($result)){
              echo '<tr>';
              echo '<td class="th1">' . $rows['patient_Name'] . '</td>';
              echo '<td class="th1">' . $rows['form_Type'] . '</td>';
              echo '<td class="th1">' . $rows['date_Issued'] . '</td>';
              echo '<td class="th1">' . $rows['place_Issued'] . '</td>';
              echo '<td class="th1">' . $rows['date_Validity'] . '</td>';
              echo '<td class="th1">' . $rows['transact_Status']. '</td>';
              echo '<td class="th1">' . $rows['claimed'] . '</td>';
              echo '<td class="th1">' . $rows['patient_Rel'] . '</td>';
              echo '</tr>';
            }
          ?>
      </table>
    </div>
    <script>
        function dbPage(){
            window.location.href = 'index.php';
        }
        function viewAppointPage(){
            window.location.href = 'appointment.php';
        }
        function viewPatientPage(){
            window.location.href = 'viewpatient.php';
        }
        function selfPage(){
          window.location.href = 'transaction.php';
        }
    </script>
  </body>
</html>
