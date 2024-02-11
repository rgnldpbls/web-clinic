<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #4</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probFour.css" />
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
        $query = "SELECT department, COUNT(*) AS Number_Of_Female_Patients FROM patient WHERE patient_Sex = 'female' 
        GROUP BY department HAVING COUNT(*)>1";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems3">
      <div class="base3"></div>
      <div class="admin-dashboard-sql-problems-child4"></div>
      <div class="base-main-header3"></div>
      <div class="table-body3">
        <div class="table-body-child5"></div>
        <div class="table-body-child6"></div>
        <div class="table-body-child7"></div>
      </div>
      <input class="welcome-fn-mi3" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout6" type="submit" name="logoutBTN">
        <div class="logout-child1"></div>
        <div class="logout7">Logout</div>
      </button>
    </form>
      <div class="header9">
        <div class="sql-problems6">SQL Problems</div>
        <div class="header-child1"></div>
      </div>
      <table class="header10">
          <tr class="tr4">
            <th class="th">
                <div class="transactions5">Department</div>
            </th>
            <th class="th">
                <div class="transactions5">Number of Female Patients</div>
            </th>
          </tr>
          <?php 
            if(isset($_POST['run'])){
                while($rows = mysqli_fetch_assoc($result)){
                  echo '<tr>';
                  echo '<td class="th1">' . $rows['admin_Id'] . '</td>';
                  echo '<td class="th1">' . $rows['admin_Name'] . '</td>';
                  echo '</tr>';
                }
              }
          ?>
      </table>
      <div class="basic3">Basic</div>
      <div class="sidebar-container3">
        <div class="sidebar3"></div>
        <img class="bg-pic-icon3" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems7" type="button" onclick="selfPage()">
          <div class="book-an-appointment3">SQL Problems</div>
          <img class="icon-qmark3" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel3" type="button" onclick="addPersonnelPage()">
          <div class="appointments3">Personnel</div>
          <img class="icons-8-13" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard6" type="button" onclick="dbPage()">
          <div class="dashboard7">Dashboard</div>
          <img
            class="dashboard-icon3"
            alt=""
            src="./public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header11">
        <img class="logo-icon3" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment3">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila3">Sta. Mesa, Manila</div>
      </div>
      <div class="footer3">
        <div class="footer-child1"></div>
        <div class="bsit-3-2n-group3">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at3">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title3">
        <div class="admin-dashboard3">Admin Dashboard</div>
        <div class="admin-dashboard-title-child1"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child5"></div>
    <form action="probFour.php" method="post">
      <button class="confirm3" type="submit" name="run">
        <div class="confirm-child1"></div>
        <div class="run3">Run</div>
      </button>
    </form>
      <div class="count-the-number">
        4. Count the number of female patients in each department. Include the
        department and having more than 1 female patient.
      </div>
      <button class="nextbtn3" type="button" onclick="nextPage()">
        <div class="backbtn-inner"></div>
        <div class="next3">Next</div>
        <img class="arrow-icon3" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn2" type="button" onclick="prevPage()">
        <div class="backbtn-inner"></div>
        <div class="back2">Back</div>
        <img class="left-icon2" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probThree.php';
        }
        function nextPage(){
            window.location.href = 'probFive.php';
        }
    </script>
  </body>
</html>
