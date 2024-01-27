<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>View Appointment</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/viewappointment.css" />
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
        if (isset($_POST['logoutBTN'])) {      
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
        include '../dbconfig.php';
        $patientId = $_SESSION['patientId'];
        $query = "SELECT appoint_No, appoint_Info, appoint_Date, appoint_Time, appoint_Status, pers_Id
        FROM appointment
        WHERE patient_Id = '$patientId'
        ORDER BY appoint_No DESC";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="patient-dashboard-appointments">
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
        <button class="appointments2" type="button" onclick="selfPage()">
          <div class="dashboard3">Appointments</div>
          <img
            class="appointments-icon1"
            alt=""
            src="public/appointmentsicon@2x.png"
          />
        </button>
        <button class="book-an-appointment3" type="button" onclick="bookPage()">
          <div class="book-an-appointment4">Book an Appointment</div>
          <img class="book-icon1" alt="" src="public/bookicon@2x.png" />
        </button>
        <button class="transactions2" type="button" onclick="transactPage()">
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
        <div class="patient-dashboard1">Patient Dashboard</div>
        <div class="patient-dashboard-title-item"></div>
      </div>
      <div class="patient-dashboard-appointments-child"></div>
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
        <div class="appointments4">Appointments</div>
        <div class="header-item"></div>
      </div>
      <table class="table">
          <tr>
            <th class="th">
              <div class="appointments5">Appointment No</div>
            </th>
            <th class="th">
                <div class="appointments5">Details</div>
            </th>
            <th class="th">
                <div class="appointments5">Date</div>
            </th>
            <th class="th">
                <div class="appointments5">Time</div>
            </th>
            <th class="th">
                <div class="appointments5">Status</div>
            </th>
            <th class="th">
                <div class="appointments5">Assigned Personnel</div>
            </th>
          </tr>
          <?php 
            while($rows = mysqli_fetch_assoc($result)){
                $persId = $rows['pers_Id'];
                if($persId === NULL){
                    $persName = 'None';
                }else{
                    $query2 = "SELECT pers_Name FROM personnel WHERE pers_Id = '$persId'";
                    $result2 = mysqli_query($conn, $query2);
                    $row = mysqli_fetch_assoc($result2);
                    $persName = $row['pers_Name'];
                }
                echo '<tr>';
                echo '<td class="th1">' . $rows['appoint_No'] . '</td>';
                echo '<td class="th1">' . $rows['appoint_Info'] . '</td>';
                echo '<td class="th1">' . $rows['appoint_Date'] . '</td>';
                echo '<td class="th1">' . $rows['appoint_Time'] . '</td>';
                echo '<td class="th1">' . $rows['appoint_Status'] . '</td>';
                echo '<td class="th1">' . $persName . '</td>';
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
            window.location.href = 'viewappointment.php';
        }
        function bookPage(){
            window.location.href = 'booking.php';
        }
        function transactPage(){
          window.location.href = 'transaction.php';
        }
    </script>
  </body>
</html>
