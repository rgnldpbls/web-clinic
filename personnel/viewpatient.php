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
        WHERE pers_Id = '$persId' AND appoint_Status IN('Approved', 'Rejected')
        ORDER BY appoint_Date DESC";
        $result = mysqli_query($conn, $query);
        if(isset($_POST['confirmBTN'])){
          $transactStatus = $_POST['transactStatus'];
          $dateIssued = isset($_POST['dateIssued']) ? $_POST['dateIssued'] : NULL;
          $placeIssued = isset($_POST['placeIssued']) ? $_POST['placeIssued'] : NULL;
          $validDate = isset($_POST['validDate']) ? $_POST['validDate'] : NULL;
          $formType = isset($_POST['formType']) ? $_POST['formType'] : NULL;
          $claimed = isset($_POST['claimed']) ? $_POST['claimed'] : NULL;
          $rel = isset($_POST['patientRel']) ? $_POST['patientRel'] : NULL;
          if(!empty($dateIssued) && !empty($placeIssued) && !empty($validDate) && !empty($formType) && 
          !empty($_POST['claimed']) && !empty($rel) && $transactStatus === 'Completed'){
            echo '<script>alert("Transaction added"); 
            window.location.href = "transaction.php";</script>';
          }else if($transactStatus === 'Nonattendance'){
            echo '<script>alert("Transaction added"); 
            window.location.href = "transaction.php";</script>';
          }else{
            echo '<script>alert("Invalid, Please try Again!"); 
            window.location.href = "viewpatient.php";</script>';
          }
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
                  echo '<td class="th1">' . '<button onclick="transactForm();">View</button>'. '</td>';
                }
                else{
                  echo '<td class="th1"></td>';
                }
                echo '</tr>';
              }
          ?>
      </table>
    </div>
<div id="id01" class="modal"> 
  <form class="modal-content" action="viewpatient.php" method="post">
    <div class="contents-parent">
        <div class="contents">
          <div class="form-type">
            <div class="form-type-child"></div>
            <div class="relation-to-the">Form Type</div>
            <div class="form-type-item"></div>
            <input class="form-type-inner" type="text" name="formType"/>
          </div>
          <div class="relation">
            <div class="relation-child"></div>
            <div class="relation-item"></div>
            <input class="relation-inner" type="text" name="patientRel"/>
            <div class="relation-to-the">Relation to the Patient</div>
          </div>
          <div class="claimed-by">
            <div class="claimed-by-child"></div>
            <div class="claimed-by1">Claimed By</div>
            <div class="claimed-by-item"></div>
            <input class="claimed-by-inner" type="text" name="claimed"/>
          </div>
          <div class="date-validity">
            <div class="date-validity-child"></div>
            <div class="date-validity-item"></div>
            <input class="date-validity-inner" type="date" name="validDate" min="<?php echo date('Y-m-d'); ?>"/>
            <div class="date-validity1">Date Validity</div>
          </div>
          <div class="date-issued">
            <div class="date-issued-child"></div>
            <div class="date-issued1">Date Issued</div>
            <div class="date-validity-item"></div>
            <input class="date-issued-inner" type="date" name="dateIssued" min="<?php echo date('Y-m-d'); ?>"/>
          </div>
          <div class="place-issued">
            <div class="date-issued-child"></div>
            <div class="date-issued1">Place Issued</div>
            <div class="date-validity-item"></div>
            <input class="date-issued-inner" type="text" name="placeIssued"/>
          </div>
        </div>
        <div class="transaction-details">Transaction Details</div>
        <button class="confirmbtn" type="submit" name="confirmBTN">
          <div class="confirmbtn-child"></div>
          <div class="confirm">Confirm</div>
        </button>
        <div class="transaction-status">
          <div class="transaction-status-child"></div>
          <div class="appointment-status">Transaction Status</div>
          <select class="transaction-status-item" name="transactStatus" required>
            <option value="Completed">Completed</option>
            <option value="Nonattendance">Nonattendance</option>
          </select>
        </div>
        <div class="header2">
          <div class="personnel-dashboard1">Add Transaction</div>
          <div class="header-child"></div>
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
      </div>
  </form>
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
      function transactForm(){
        var element = document.getElementById("id01");
          if (element) {
            element.style.display = "block";
          }
      }
    </script>
  </body>
</html>
