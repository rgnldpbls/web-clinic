<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #1</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probindx.css" />
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
        $query = "SELECT patient_Name, patient_Type, department FROM patient WHERE blood_Type = 'O-'";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems">
      <div class="base"></div>
      <div class="admin-dashboard-sql-problems-child"></div>
      <div class="base-main-header"></div>
      <div class="table-body">
        <div class="table-body-child"></div>
        <div class="table-body-item"></div>
        <div class="table-body-inner"></div>
      </div>
      <input class="welcome-fn-mi" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout" type="submit" name="logoutBTN">
        <div class="logout-child"></div>
        <div class="logout1">Logout</div>
      </button>
    </form>
      <div class="header">
        <div class="sql-problems">SQL Problems</div>
        <div class="header-child"></div>
      </div>
      <table class="header1">
          <tr class="tr">
            <th class="th">
              <div class="transactions5">Patient Name</div>
            </th>
            <th class="th">
              <div class="transactions5">Patient Type</div>
            </th>
            <th class="th">
              <div class="transactions5">Department</div>
            </th>
          </tr>
          <?php 
            if(isset($_POST['run'])){
              while($rows = mysqli_fetch_assoc($result)){
                echo '<tr>';
                echo '<td class="th1">' . $rows['patient_Name'] . '</td>';
                echo '<td class="th1">' . $rows['patient_Type'] . '</td>';
                echo '<td class="th1">' . $rows['department'] . '</td>';
                echo '</tr>';
              }
            }
          ?>
      </table>
      <div class="basic">Basic</div>
      <div class="sidebar-container">
        <div class="sidebar"></div>
        <img class="bg-pic-icon" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems1" type="button" onclick="selfPage()">
          <div class="book-an-appointment">SQL Problems</div>
          <img class="icon-qmark" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel" type="button" onclick="addPersonnelPage()">
          <div class="appointments">Personnel</div>
          <img class="icons-8-1" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard" type="button" onclick="dbPage()">
          <div class="dashboard1">Dashboard</div>
          <img
            class="dashboard-icon"
            alt=""
            src="./public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header2">
        <img class="logo-icon" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
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
      <div class="admin-dashboard-title">
        <div class="admin-dashboard">Admin Dashboard</div>
        <div class="admin-dashboard-title-child"></div>
      </div>
      <div class="admin-dashboard-sql-problems-item"></div>
    <form action="probindx.php" method="post">
      <button class="confirm" type="submit" name="run">
        <div class="confirm-child"></div>
        <div class="run">Run</div>
      </button>
    </form>
      <div class="list-all-the">
        1. List all the patients who have the universal blood type (O-). Include
        the name, type of patient and the department.
      </div>
      <button class="nextbtn" type="button" onclick="nextPage()">
        <div class="nextbtn-child"></div>
        <div class="next">Next</div>
        <img class="arrow-icon" alt="" src="public/arrow@2x.png" />
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
        function nextPage(){
            window.location.href = 'probTwo.php';
        }
    </script>
  </body>
</html>
