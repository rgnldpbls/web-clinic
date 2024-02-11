<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #6</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probSix.css" />
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
        $query = "SELECT appoint_Status, COUNT(*) AS Number_Of_Appointment FROM appointment WHERE appoint_Info LIKE '%Medical Clearance%'
        GROUP BY appoint_Status ORDER BY 2 DESC";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems5">
      <div class="base5"></div>
      <div class="admin-dashboard-sql-problems-child8"></div>
      <div class="base-main-header5"></div>
      <div class="table-body5">
        <div class="table-body-child11"></div>
        <div class="table-body-child12"></div>
        <div class="table-body-child13"></div>
      </div>
      <input class="welcome-fn-mi5" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout10" type="submit" name="logoutBTN">
        <div class="logout-child3"></div>
        <div class="logout11">Logout</div>
      </button>
    </form>
      <div class="header15">
        <div class="sql-problems10">SQL Problems</div>
        <div class="header-child3"></div>
      </div>
      <table class="header16">
        <?php 
            if(isset($_POST['run'])){
                echo '<tr class="tr8">';
                echo '<th class="th4">';
                echo '<div class="transactions5">Appointment Status</div>';
                echo '</th>';
                echo '<th class="th4">';
                echo '<div class="transactions5">Number of Appointment</div>';
                echo '</th>';
                echo '</tr>';
                while($rows = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td class="th1">' . $rows['appoint_Status'] . '</td>';
                    echo '<td class="th1">' . $rows['Number_Of_Appointment'] . '</td>';
                    echo '</tr>';
                }
            }
        ?>
      </table>
      <div class="basic5">Basic</div>
      <div class="sidebar-container5">
        <div class="sidebar5"></div>
        <img class="bg-pic-icon5" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems11" type="button" onclick="selfPage()">
          <div class="book-an-appointment5">SQL Problems</div>
          <img class="icon-qmark5" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel5" type="button" onclick="addPersonnelPage()">
          <div class="appointments5">Personnel</div>
          <img class="icons-8-15" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard10" type="button" onclick="dbPage()">
          <div class="dashboard11">Dashboard</div>
          <img
            class="dashboard-icon5"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header17">
        <img class="logo-icon5" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment5">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila5">Sta. Mesa, Manila</div>
      </div>
      <div class="footer5">
        <div class="footer-child3"></div>
        <div class="bsit-3-2n-group5">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at5">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title5">
        <div class="admin-dashboard5">Admin Dashboard</div>
        <div class="admin-dashboard-title-child3"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child9"></div>
    <form action="probSix.php" method="post">
      <button class="confirm5" type="submit" name="run">
        <div class="confirm-child3"></div>
        <div class="run5">Run</div>
      </button>
    </form>
      <div class="count-the-number2">
        6. Count the number of appointments in each status which the appointment
        info is like requesting medical clearance. Include the appointment
        status and sort it from highest to lowest number of appointments.
      </div>
      <button class="nextbtn5" type="button" onclick="nextPage()">
        <div class="nextbtn-child3"></div>
        <div class="next5">Next</div>
        <img class="arrow-icon5" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn4" type="button" onclick="prevPage()">
        <div class="nextbtn-child3"></div>
        <div class="back4">Back</div>
        <img class="left-icon4" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probFive.php';
        }
        function nextPage(){
            window.location.href = 'probSeven.php';
        }
    </script>
  </body>
</html>
