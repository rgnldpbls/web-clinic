<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #3</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probThree.css" />
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
        $query = "SELECT admin_Id, admin_Name FROM admin WHERE admin_Name LIKE '%Z%'";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems2">
      <div class="base2"></div>
      <div class="admin-dashboard-sql-problems-child2"></div>
      <div class="base-main-header2"></div>
      <div class="table-body2">
        <div class="table-body-child2"></div>
        <div class="table-body-child3"></div>
        <div class="table-body-child4"></div>
      </div>
      <input class="welcome-fn-mi2" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">  
      <button class="logout4" type="submit" name="logoutBTN">
        <div class="logout-inner"></div>
        <div class="logout5">Logout</div>
      </button>
    </form>
      <div class="header6">
        <div class="sql-problems4">SQL Problems</div>
        <div class="header-inner"></div>
      </div>
      <table class="header7">
          <?php 
            if(isset($_POST['run'])){
              echo '<tr class="tr2">';
              echo '<th class="th">';
              echo '<div class="transactions5">Admin Id</div>';
              echo '</th>';
              echo '<th class="th">';
              echo '<div class="transactions5">Admin Name</div>';
              echo '</th>';
              echo '</tr>';
                while($rows = mysqli_fetch_assoc($result)){
                  echo '<tr>';
                  echo '<td class="th1">' . $rows['admin_Id'] . '</td>';
                  echo '<td class="th1">' . $rows['admin_Name'] . '</td>';
                  echo '</tr>';
                }
              }
          ?>
      </table>
      <div class="basic2">Basic</div>
      <div class="sidebar-container2">
        <div class="sidebar2"></div>
        <img class="bg-pic-icon2" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems5" type="button" onclick="selfPage()">
          <div class="book-an-appointment2">SQL Problems</div>
          <img class="icon-qmark2" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel2" type="button" onclick="addPersonnelPage()">
          <div class="appointments2">Personnel</div>
          <img class="icons-8-12" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard4" type="button" onclick="dbPage()">
          <div class="dashboard5">Dashboard</div>
          <img
            class="dashboard-icon2"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header8">
        <img class="logo-icon2" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment2">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila2">Sta. Mesa, Manila</div>
      </div>
      <div class="footer2">
        <div class="footer-inner"></div>
        <div class="bsit-3-2n-group2">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at2">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title2">
        <div class="admin-dashboard2">Admin Dashboard</div>
        <div class="admin-dashboard-title-inner"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child3"></div>
    <form action="probThree.php" method="post">
      <button class="confirm2" type="submit" name="run">
        <div class="confirm-inner"></div>
        <div class="run2">Run</div>
      </button>
    </form>
      <div class="list-all-the2">
        3. List all the id and names of the admins who have ‘Z’ on their names.
      </div>
      <button class="nextbtn2" type="button" onclick="nextPage()">
        <div class="nextbtn-inner"></div>
        <div class="next2">Next</div>
        <img class="arrow-icon2" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn1" type="button" onclick="prevPage()">
        <div class="nextbtn-inner"></div>
        <div class="back1">Back</div>
        <img class="left-icon1" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probTwo.php';
        }
        function nextPage(){
            window.location.href = 'probFour.php';
        }
    </script>
  </body>
</html>
