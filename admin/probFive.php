<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #5</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probFive.css" />
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
        $query = "SELECT pers_Type, pers_Sex, COUNT(*) AS Number_Of_Personnel FROM personnel 
        GROUP BY pers_Type, pers_Sex ORDER BY 2, 1";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems4">
      <div class="base4"></div>
      <div class="admin-dashboard-sql-problems-child6"></div>
      <div class="base-main-header4"></div>
      <div class="table-body4">
        <div class="table-body-child8"></div>
        <div class="table-body-child9"></div>
        <div class="table-body-child10"></div>
      </div>
      <input class="welcome-fn-mi4" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout8" type="submit" name="logoutBTN">
        <div class="logout-child2"></div>
        <div class="logout9">Logout</div>
      </button>
    </form>
      <div class="header12">
        <div class="sql-problems8">SQL Problems</div>
        <div class="header-child2"></div>
      </div>
      <table class="header13">
          <?php 
            if(isset($_POST['run'])){
                echo '<tr class="tr6">';
                echo '<th class="th">';
                echo '<div class="transactions5">Personnel Type</div>';
                echo '</th>';
                echo '<th class="th">';
                echo '<div class="transactions5">Personnel Sex</div>';
                echo '</th>';
                echo '<th class="th">';
                echo '<div class="transactions5">Number of Personnel</div>';
                echo '</th>';
                echo '</tr>';
                while($rows = mysqli_fetch_assoc($result)){
                  echo '<tr>';
                  echo '<td class="th1">' . $rows['pers_Type'] . '</td>';
                  echo '<td class="th1">' . $rows['pers_Sex'] . '</td>';
                  echo '<td class="th1">' . $rows['Number_Of_Personnel'] . '</td>';
                  echo '</tr>';
                }
              }
          ?>
      </table>
      <div class="basic4">Basic</div>
      <div class="sidebar-container4">
        <div class="sidebar4"></div>
        <img class="bg-pic-icon4" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems9" type="button" onclick="selfPage()">
          <div class="book-an-appointment4">SQL Problems</div>
          <img class="icon-qmark4" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel4" type="button" onclick="addPersonnelPage()">
          <div class="appointments4">Personnel</div>
          <img class="icons-8-14" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard8" type="button" onclick="dbPage()">
          <div class="dashboard9">Dashboard</div>
          <img
            class="dashboard-icon4"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header14">
        <img class="logo-icon4" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment4">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila4">Sta. Mesa, Manila</div>
      </div>
      <div class="footer4">
        <div class="footer-child2"></div>
        <div class="bsit-3-2n-group4">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at4">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title4">
        <div class="admin-dashboard4">Admin Dashboard</div>
        <div class="admin-dashboard-title-child2"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child7"></div>
    <form action="probFive.php" method="post">
      <button class="confirm4" type="submit" name="run">
        <div class="confirm-child2"></div>
        <div class="run4">Run</div>
      </button>
    </form>
      <div class="count-the-number1">
        5. Count the number of personnel in each type and each gender. Include
        the type of personnel and gender. Sorted by gender and type.
      </div>
      <button class="nextbtn4" type="button" onclick="nextPage()">
        <div class="nextbtn-child2"></div>
        <div class="next4">Next</div>
        <img class="arrow-icon4" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn3" type="button" onclick="prevPage()">
        <div class="nextbtn-child2"></div>
        <div class="back3">Back</div>
        <img class="left-icon3" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probFour.php';
        }
        function nextPage(){
            window.location.href = 'probSix.php';
        }
    </script>
  </body>
</html>
