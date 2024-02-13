<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>SQL Problem #8</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/probEight.css" />
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
        $query = "SELECT * FROM patient_medprob";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="admin-dashboard-sql-problems7">
      <div class="base7"></div>
      <div class="admin-dashboard-sql-problems-child12"></div>
      <div class="base-main-header7"></div>
      <div class="table-body7">
        <div class="table-body-child17"></div>
        <div class="table-body-child18"></div>
        <div class="table-body-child19"></div>
      </div>
      <input class="welcome-fn-mi7" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
    <form method="post">
      <button class="logout14" type="submit" name="logoutBTN">
        <div class="logout-child5"></div>
        <div class="logout15">Logout</div>
      </button>
    </form>
      <div class="header21">
        <div class="sql-problems14">SQL Problems</div>
        <div class="header-child5"></div>
      </div>
      <table class="header22">
        <?php 
            if(isset($_POST['run'])){
                echo '<tr class="tr12">';
                echo '<th class="th6">';
                echo '<div class="transactions5">Patient Name</div>';
                echo '</th>';
                echo '<th class="th6">';
                echo '<div class="transactions5">Medical History Id</div>';
                echo '</th>';
                echo '</tr>';
                while($rows = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td class="th1">' . $rows['patient_Name'] . '</td>';
                    echo '<td class="th1">' . $rows['mdHist_Id'] . '</td>';
                    echo '</tr>';
                }
            }
        ?>
      </table>
      <div class="multiple-tables1">Multiple Tables</div>
      <div class="sidebar-container7">
        <div class="sidebar7"></div>
        <img class="bg-pic-icon7" alt="" src="public/bg-pic@2x.png" />
        <button class="sql-problems15" type="button" onclick="selfPage()">
          <div class="book-an-appointment7">SQL Problems</div>
          <img class="icon-qmark7" alt="" src="public/iconqmark@2x.png" />
        </button>
        <button class="personnel7" type="button" onclick="addPersonnelPage()">
          <div class="appointments7">Personnel</div>
          <img class="icons-8-17" alt="" src="public/icons-8-1@2x.png" />
        </button>
        <button class="dashboard14" type="button" onclick="dbPage()">
          <div class="dashboard15">Dashboard</div>
          <img
            class="dashboard-icon7"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
      </div>
      <div class="header23">
        <img class="logo-icon7" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment7">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila7">Sta. Mesa, Manila</div>
      </div>
      <div class="footer7">
        <div class="footer-child5"></div>
        <div class="bsit-3-2n-group7">
          © 2024 BSIT 3-2N Group 7 | All Rights Reserved
        </div>
        <div class="contact-us-at7">
          Contact us at: 1234-5678 local 123 | Email us at:
          group7email@gmail.com
        </div>
      </div>
      <div class="admin-dashboard-title7">
        <div class="admin-dashboard7">Admin Dashboard</div>
        <div class="admin-dashboard-title-child5"></div>
      </div>
      <div class="admin-dashboard-sql-problems-child13"></div>
    <form action="probEight.php" method="post">
      <button class="confirm7" type="submit" name="run">
        <div class="confirm-child5"></div>
        <div class="run7">Run</div>
      </button>
    </form>
      <div class="display-the-patient">
        8. Display the patient name and medical history id of the
        patient who needs medical attention, has allergies on foods or allergies
        on medicine.
      </div>
      <button class="nextbtn7" type="button" onclick="nextPage()">
        <div class="nextbtn-child5"></div>
        <div class="next7">Next</div>
        <img class="arrow-icon7" alt="" src="public/arrow@2x.png" />
      </button>
      <button class="backbtn6" type="button" onclick="prevPage()">
        <div class="nextbtn-child5"></div>
        <div class="back6">Back</div>
        <img class="left-icon6" alt="" src="public/left@2x.png" />
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
            window.location.href = 'probSeven.php';
        }
        function nextPage(){
            window.location.href = 'probNine.php';
        }
    </script>
  </body>
</html>
