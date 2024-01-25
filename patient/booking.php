<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/booking.css" />
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
        if(isset($_POST['confirmBTN'])) {
          chkpendingAppoint();
        }
        function chkpendingAppoint() {
          include '../dbconfig.php';
          $patientId = $_SESSION['patientId'];
          $appointDate = $_POST['appointDate'];
          $appointTime = $_POST['appointTime'];
          $appointInfo = $_POST['appointInfo'];
          $appointStatus = "Pending";
          $selectDateTime = new DateTime($appointDate);
          $currentDateTime = new DateTime();
          $sql = "SELECT * FROM appointment WHERE appoint_Date = '$appointDate' AND appoint_Time = '$appointTime' AND patient_Id = '$patientId'";
          $res = mysqli_query($conn, $sql);
          if(mysqli_num_rows($res)!=0){
            echo '<script>alert("You have duplicate appointment!")
            window.location.href="viewappointment.php"</script>';
          }else if($selectDateTime <= $currentDateTime){
            echo '<script>alert("Error: Please select a date that is not earlier than today.")</script>';
          }else{
            $query = "INSERT INTO appointment(appoint_Info, appoint_Date, appoint_Time, appoint_Status, patient_Id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $appointInfo, $appointDate, $appointTime, $appointStatus, $patientId);
            $stmt->execute();
            $stmt->close();

            $last_inserted_id = $conn->insert_id;
            $transactStatus = "Pending";
            $query2 = "INSERT INTO transaction(transact_Status, appoint_No) VALUES (?, ?)";
            $stmt = $conn->prepare($query2);
            $stmt->bind_param("si", $transactStatus, $last_inserted_id);
            $stmt->execute();
            $stmt->close();
            echo '<script>alert("Appointment added successfully"); 
            window.location.href = "viewappointment.php";</script>';
          }
        }
    ?>
    <div class="patient-dashboard-book">
      <div class="base"></div>
      <div class="sidebar-container">
        <div class="sidebar"></div>
        <img class="bg-pic-icon" alt="" src="./public/bg-pic@2x.png" />
        <button class="dashboard" type="button" onclick="dbPage()">
          <div class="dashboard1">Dashboard</div>
          <img
            class="dashboard-icon"
            alt=""
            src="./public/dashboardicon@2x.png"
          />
        </button>
        <button class="appointments" type="button" onclick="viewAppointPage()">
          <div class="dashboard1">Appointments</div>
          <img
            class="appointments-icon"
            alt=""
            src="./public/appointmentsicon@2x.png"
          />
        </button>
        <button class="book-an-appointment" type="button" onclick="selfPage()">
          <div class="book-an-appointment1">Book an Appointment</div>
          <img class="book-icon" alt="" src="./public/bookicon@2x.png" />
        </button>
        <button class="transactions">
          <div class="transactions1">Transactions</div>
          <img
            class="transactions-icon"
            alt=""
            src="./public/transactionsicon@2x.png"
          />
        </button>
      </div>
      <div class="header">
        <img class="logo-icon" alt="" src="./public/logo@2x.png" />

        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
      <div class="patient-dashboard-title">
        <div class="patient-dashboard">Patient Dashboard</div>
        <div class="patient-dashboard-title-child"></div>
      </div>
      <div class="patient-dashboard-book-child"></div>
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
        <div class="book-an-appointment2">Book an Appointment</div>
        <div class="header-child"></div>
      </div>
      <form action = "booking.php" method = "post">
        <div class="contents">
          <div class="appointment-date">
            <div class="appointment-date1">Appointment Date</div>
            <input class="appointment-date-item" type="date" name="appointDate" required/>
          </div>
          <div class="appointment-time">
            <div class="appointment-date1">Appointment Time</div>
            <input class="appointment-time-item" type="time" name="appointTime" required/>
          </div>
          <div class="appointment-information">
            <div class="appointment-information1">Appointment Information</div>
            <textarea class="appointment-information-child" name="appointInfo" placeholder="Please provide details on the purpose of your appointment" required></textarea>
          </div>
        </div>
        <button class="confirm" type="submit" name="confirmBTN">
          <div class="confirm-child"></div>
          <div class="confirm1">Confirm</div>
        </button>
      </form>
    </div>
    <script>
        function dbPage(){
            window.location.href = 'index.php';
        }
        function viewAppointPage(){
          window.location.href = 'viewappointment.php';
        }
        function selfPage(){
            window.location.href = 'booking.php';
        }
    </script>
  </body>
</html>
