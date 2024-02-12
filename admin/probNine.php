<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #9</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probNine.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
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
        // $upd = "CALL sproc_upd(10, 3)";
        // $stmt = $conn->prepare($upd);
        // $stmt->execute();
        // $stmt->close(); 
        $query = "CALL sproc_checkUpd(10)";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems8">
      <div class="base8"></div>
      <div class="admin-dashboard-sql-problems-child14"></div>
      <div class="base-main-header8"></div>
      <div class="table-body8">
        <div class="table-body-child20"></div>
        <div class="table-body-child21"></div>
        <div class="table-body-child22"></div>
      </div>
      <input class="welcome-fn-mi8" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout16" type="submit" name="logoutBTN">
        <div class="logout-child6"></div>
        <div class="logout17">Logout</div>
      </button>
    </form>
      <div class="header24">
        <div class="sql-problems16">SQL Problems</div>
        <div class="header-child6"></div>
      </div>
      <table class="header25">
        <?php
          if(isset($_POST['run'])){
            echo '<tr class="tr14">';
            echo '<th class="th7">';
            echo '<div class="transactions5">Patient Id</div>';
            echo '</th>';
            echo '<th class="th7">';
            echo '<div class="transactions5">Patient Name</div>';
            echo '</th>';
            echo '<th class="th7">';
            echo '<div class="transactions5">Appoint No.</div>';
            echo '</th>';
            echo '<th class="th7">';
            echo '<div class="transactions5">Appointment Patient Id</div>';
            echo '</th>';
            echo '</tr>';
            while($rows = mysqli_fetch_assoc($result)){
              echo '<tr>';
              echo '<td class="th1">' . $rows['patientId'] . '</td>';
              echo '<td class="th1">' . $rows['patient_Name'] . '</td>';
              echo '<td class="th1">' . $rows['appoint_No'] . '</td>';
              echo '<td class="th1">' . $rows['fpatientId'] . '</td>';
              echo '</tr>';
          }
          }
        ?>
      </table>
      <div class="foreign-key-constraints">Foreign Key Constraints</div>
      <div class="sidebar-container8">
        <div class="sidebar8"></div>
        <img class="bg-pic-icon8" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems17" type="button" onclick="selfPage()">
          <div class="book-an-appointment8">SQL Problems</div>
          <img class="icon-qmark8" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel8" type="button" onclick="addPersonnelPage()">
          <div class="appointments8">Personnel</div>
          <img class="icons-8-18" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard16" type="button" onclick="dbPage()">
          <div class="dashboard17">Dashboard</div>
          <img
            class="dashboard-icon8"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header26">
        <img class="logo-icon8" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment8">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila8">Sta. Mesa, Manila</div>
      </div>
      <div class="footer8">
        <div class="footer-child6"></div>
        <div class="bsit-3-2n-group8">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at8">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title8">
        <div class="admin-dashboard8">Admin Dashboard</div>
        <div class="admin-dashboard-title-child6"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child15"></div>
    <form action="probNine.php" method="post">
      <button class="confirm8" type="submit" name="run">
        <div class="confirm-child6"></div>
        <div class="run8">Run</div>
      </button>
    </form>
      <div class="if-patient-id-is">
        9. If patient_id is updated from the patient table, the corresponding
        patient_id must be updated as well in the appointment table
      </div>
      <button class="nextbtn8" type="button" onclick="nextPage()">
        <div class="nextbtn-child6"></div>
        <div class="next8">Next</div>
        <img class="arrow-icon8" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn7" type="button" onclick="prevPage()">
        <div class="nextbtn-child6"></div>
        <div class="back7">Back</div>
        <img class="left-icon7" alt="" src="public/left@2x.png" />
      </button>
    </div>
    <script>
        function dbPage(){
            window.location.href = 'index.php';
        }
        function addPersonnelPage(){
            window.location.href = 'addpersonnel.php';
        }
        function selfPage(){
            window.location.href = 'probindx.php';
        }
        function prevPage(){
            window.location.href = 'probEight.php';
        }
        function nextPage(){
            window.location.href = 'probTen.php';
        }
    </script>
  </body>
</html>
