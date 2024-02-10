<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #2</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probTwo.css" />
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
    ?>
    <div class="admin-dashboard-sql-problems1">
      <div class="base1"></div>
      <div class="admin-dashboard-sql-problems-inner"></div>
      <div class="base-main-header1"></div>
      <div class="table-body1">
        <div class="rectangle-div"></div>
        <div class="line-div"></div>
        <div class="table-body-child1"></div>
      </div>
      <input class="welcome-fn-mi1" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout2" type="submit" name="logoutBTN">
        <div class="logout-item"></div>
        <div class="logout3">Logout</div>
      </button>
    </form>
      <div class="header3">
        <div class="sql-problems2">SQL Problems</div>
        <div class="header-item"></div>
      </div>
      <table class="header4">
          <tr class="tr2">
            <th class="th">
                <div class="transactions5">Personnel Name</div>
            </th>
            <th class="th">
                <div class="transactions5">Contact Number</div>
            </th>
          </tr>
      </table>
      <div class="basic1">Basic</div>
      <div class="sidebar-container1">
        <div class="sidebar1"></div>
        <img class="bg-pic-icon1" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems3" type="button" onclick="selfPage()">
          <div class="book-an-appointment1">SQL Problems</div>
          <img class="icon-qmark1" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel1" type="button" onclick="addPersonnelPage()">
          <div class="appointments1">Personnel</div>
          <img class="icons-8-11" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard2" type="button" onclick="dbPage()">
          <div class="dashboard3">Dashboard</div>
          <img
            class="dashboard-icon1"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header5">
        <img class="logo-icon1" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment1">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila1">Sta. Mesa, Manila</div>
      </div>
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
      <div class="admin-dashboard-title1">
        <div class="admin-dashboard1">Admin Dashboard</div>
        <div class="admin-dashboard-title-item"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child1"></div>
      <button class="confirm1">
        <div class="confirm-item"></div>
        <div class="run1">Run</div>
      </button>
      <button class="nextbtn1" type="button" onclick="nextPage()">
        <div class="nextbtn-item"></div>
        <div class="next1">Next</div>
        <img class="arrow-icon1" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn" type="button" onclick="prevPage()">
        <div class="nextbtn-item"></div>
        <div class="back">Back</div>
        <img class="left-icon" alt="" src="public/left@2x.png" />
      </button>
      <div class="list-all-the1">
        2. List all the doctor personnel in the clinic. Include the name and the
        contact number.
      </div>
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
            window.location.href = 'probindx.php';
        }
        function nextPage(){
            window.location.href = '#';
        }
    </script>
  </body>
</html>
