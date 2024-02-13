<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #7</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probSeven.css" />
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
        $query = "SELECT * FROM nonattendance_type";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems6">
      <div class="base6"></div>
      <div class="admin-dashboard-sql-problems-child10"></div>
      <div class="base-main-header6"></div>
      <div class="table-body6">
        <div class="table-body-child14"></div>
        <div class="table-body-child15"></div>
        <div class="table-body-child16"></div>
      </div>
      <input class="welcome-fn-mi6" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout12" type="submit" name="logoutBTN">
        <div class="logout-child4"></div>
        <div class="logout13">Logout</div>
      </button>
    </form>
      <div class="header18">
        <div class="sql-problems12">SQL Problems</div>
        <div class="header-child4"></div>
      </div>
      <table class="header19">
        <?php 
            if(isset($_POST['run'])){
                echo '<tr class="tr10">';
                echo '<th class="th5">';
                echo '<div class="transactions5">Appointment No</div>';
                echo '</th>';
                echo '<th class="th5">';
                echo '<div class="transactions5">Patient Name</div>';
                echo '</th>';
                echo '<th class="th5">';
                echo '<div class="transactions5">Personnel Name</div>';
                echo '</th>';
                echo '</tr>';   
                while($rows = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td class="th1">' . $rows['appoint_No'] . '</td>';
                    echo '<td class="th1">' . $rows['patient_Name'] . '</td>';
                    echo '<td class="th1">' . $rows['pers_Name'] . '</td>';
                    echo '</tr>';
                }  
            }
        ?>
      </table>
      <div class="multiple-tables">Multiple Tables</div>
      <div class="sidebar-container6">
        <div class="sidebar6"></div>
        <img class="bg-pic-icon6" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems13" type="button" onclick="selfPage()">
          <div class="book-an-appointment6">SQL Problems</div>
          <img class="icon-qmark6" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel6" type="button" onclick="addPersonnelPage()">
          <div class="appointments6">Personnel</div>
          <img class="icons-8-16" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard12" type="button" onclick="dbPage()">
          <div class="dashboard13">Dashboard</div>
          <img
            class="dashboard-icon6"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header20">
        <img class="logo-icon6" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment6">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila6">Sta. Mesa, Manila</div>
      </div>
      <div class="footer6">
        <div class="footer-child4"></div>
        <div class="bsit-3-2n-group6">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at6">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title6">
        <div class="admin-dashboard6">Admin Dashboard</div>
        <div class="admin-dashboard-title-child4"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child11"></div>
    <form action="probSeven.php" method="post">
      <button class="confirm6" type="submit" name="run">
        <div class="confirm-child4"></div>
        <div class="run6">Run</div>
      </button>
    </form>
      <div class="list-all-appointments">
        7. List all the Nonattendance appointment status. Include the appointment
        number, patient name who scheduled for the appointment, and
        name of personnel assigned in the appointment. Sort it in the patient name.
      </div>
      <button class="nextbtn6" type="button" onclick="nextPage()">
        <div class="nextbtn-child4"></div>
        <div class="next6">Next</div>
        <img class="arrow-icon6" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn5" type="button" onclick="prevPage()">
        <div class="nextbtn-child4"></div>
        <div class="back5">Back</div>
        <img class="left-icon5" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probSix.php';
        }
        function nextPage(){
            window.location.href = 'probEight.php';
        }
    </script>
  </body>
</html>
