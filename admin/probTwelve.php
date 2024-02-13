<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #12</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probTwelve.css" />
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
        $query = "SELECT * FROM highest_req_appoint";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems9">
      <div class="base9"></div>
      <div class="admin-dashboard-sql-problems-child16"></div>
      <div class="base-main-header9"></div>
      <div class="table-body9">
        <div class="table-body-child23"></div>
        <div class="table-body-child24"></div>
        <div class="table-body-child25"></div>
      </div>
      <input class="welcome-fn-mi9" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout18" type="submit" name="logoutBTN">
        <div class="logout-child7"></div>
        <div class="logout19">Logout</div>
      </button>
    </form>
      <div class="header27">
        <div class="sql-problems18">SQL Problems</div>
        <div class="header-child7"></div>
      </div>
      <table class="header28">
        <?php 
          if(isset($_POST['run'])){
            echo '<tr class="tr12">';
            echo '<th class="th6">';
            echo '<div class="transactions5">Patient Name</div>';
            echo '</th>';
            echo '<th class="th6">';
            echo '<div class="transactions5">Number of Appointment</div>';
            echo '</th>';
            echo '</tr>';
            while($rows = mysqli_fetch_assoc($result)){
                echo '<tr>';
                echo '<td class="th1">' . $rows['patient_Name'] . '</td>';
                echo '<td class="th1">' . $rows['Appointment_Num'] . '</td>';
                echo '</tr>';
            }
        }
        ?>
      </table>
      <div class="foreign-key-constraints1">Subquery</div>
      <div class="sidebar-container9">
        <div class="sidebar9"></div>
        <img class="bg-pic-icon9" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems19" type="button" onclick="selfPage()">
          <div class="book-an-appointment9">SQL Problems</div>
          <img class="icon-qmark9" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel9" type="button" onclick="addPersonnelPage()">
          <div class="appointments9">Personnel</div>
          <img class="icons-8-19" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard18" type="button" onclick="dbPage()">
          <div class="dashboard19">Dashboard</div>
          <img
            class="dashboard-icon9"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header29">
        <img class="logo-icon9" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment9">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila9">Sta. Mesa, Manila</div>
      </div>
      <div class="footer9">
        <div class="footer-child7"></div>
        <div class="bsit-3-2n-group9">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at9">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title9">
        <div class="admin-dashboard9">Admin Dashboard</div>
        <div class="admin-dashboard-title-child7"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child17"></div>
    <form action="probTwelve.php" method="post">
      <button class="confirm9" type="submit" name="run">
        <div class="confirm-child7"></div>
        <div class="run9">Run</div>
      </button>
    </form>
      <div class="if-an-admin">
        12. Select the name of the patient that accumulated the highest number of requested appointments.
      </div>
      <button class="backbtn8" type="button" onclick="prevPage()">
        <div class="backbtn-child6"></div>
        <div class="back8">Back</div>
        <img class="left-icon8" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probEleven.php';
        }
    </script>
  </body>
</html>
