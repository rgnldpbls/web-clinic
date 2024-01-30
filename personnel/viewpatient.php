<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Patient</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/viewpatient.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
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
         $name = $_SESSION['fullName'];
         if (isset($_POST['logoutBTN'])) {      
            session_destroy();
            header("Location: ../login.php");
            exit();
        }
        $personnelId = $_SESSION['persId'];
        $query = "SELECT patient_Name, patient_Age, patient_Sex, patient_ContactNo, patient_Type, department, appoint_No, appoint_Info, appoint_Date, appoint_Time, md_Attention, md_Illness, md_AllergiesFoods, md_AllergiesMeds, ph_Smoking, ph_Alcohol
        FROM appointment app JOIN patient p ON app.patient_Id = p.patient_Id JOIN medhistory md ON p.mdHist_Id = md.mdHist_Id
        WHERE appoint_Status = 'Pending'";
        $result = mysqli_query($conn, $query);
    ?>
    <div class="patient-dashboard-appointments">
      <div class="base2"></div>
      <div class="sidebar-container2">
        <div class="sidebar2"></div>
        <img class="bg-pic-icon2" alt="" src="public/bg-pic@2x.png" />
        <button class="dashboard4" type="button" onclick="dbPage()">
          <div class="dashboard5">Dashboard</div>
          <img
            class="dashboard-icon2"
            alt=""
            src="public/dashboardicon@2x.png"
          />
        </button>
        <button class="appointments4" type="button" onclick="#">
          <div class="dashboard5">Appointments</div>
          <img
            class="appointments-icon2"
            alt=""
            src="public/appointmentsicon@2x.png"
          />
        </button>
        <button class="book-an-appointment5" type="button" onclick="selfPage()">
          <div class="book-an-appointment6">Patients</div>
          <img class="book-icon2" alt="" src="public/patienticon@2x.png" />
        </button>
        <button class="transactions6" type="button" onclick="#">
          <div class="transactions7">Transactions</div>
          <img
            class="transactions-icon2"
            alt=""
            src="public/transactionsicon@2x.png"
          />
        </button>
      </div>
      <div class="header4">
        <img class="logo-icon2" alt="" src="public/logo@2x.png" />
        <div class="pup-clinic-appointment2">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila2">Sta. Mesa, Manila</div>
      </div>
      <div class="patient-dashboard-title2">
        <div class="patient-dashboard2">Personnel Dashboard</div>
        <div class="patient-dashboard-title-inner"></div>
      </div>
      <div class="patient-dashboard-appointments-child"></div>
      <div class="base-main-header2"></div>
      <div class="base-main2"></div>
      <input class="welcome-fn-mi2" type="text" value="<?php echo "Welcome, $name";?>" disabled/>
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
      <form method="post">
        <button class="logout4" type="submit" name="logoutBTN">
            <div class="logout-inner"></div>
            <div class="logout5">Logout</div>
        </button>
      </form>
      <div class="header5">
        <div class="appointments6">Appointments</div>
        <div class="header-inner"></div>
      </div>
      <table class="table1">
          <tr>
            <th class="th">
              <div class="appointments7">Patient Name</div>
            </th>
            <th class="th">
              <div class="appointments7">Appointment Info</div>
            </th>
            <th class="th">
              <div class="appointments7">Appointment Date</div>
            </th>
            <th class="th">
              <div class="appointments7">Appointment Time</div>
            </th>
            <th class="th">
              <div class="appointments7"></div>
            </th>
          </tr>
          <?php
            while($rows = mysqli_fetch_assoc($result)){
                $appointNo = $rows['appoint_No'];
                $fname = $rows['patient_Name'];
                $age = $rows['patient_Age'];
                $sex = $rows['patient_Sex'];
                $contactNo = $rows['patient_ContactNo'];
                $type = $rows['patient_Type'];
                $dept = $rows['department'];
                $medAtt = $rows['md_Attention'];
                $medIll = $rows['md_Illness'];
                $foodAl = $rows['md_AllergiesFoods'];
                $medAl = $rows['md_AllergiesMeds'];
                $smkng = $rows['ph_Smoking'];
                $alc = $rows['ph_Alcohol'];
                $appointDate = $rows['appoint_Date'];
                $currentDate = date('Y-m-d');
                if($currentDate >= $appointDate){
                  $query3 = "UPDATE appointment SET appoint_Status = 'Rejected' WHERE appoint_No = '$appointNo' AND appoint_Status = 'Pending'";
                  $stmt = $conn->prepare($query3);
                  $stmt->execute();
                  $stmt->close();
                }
                echo '<tr>';
                echo '<td class="th1">' . $fname. '</td>';
                echo '<td class="th1">' . $rows['appoint_Info'] . '</td>';
                echo '<td class="th1">' . $appointDate . '</td>';
                echo '<td class="th1">' . $rows['appoint_Time'] . '</td>';
                echo '<td class="th1">' . '<button onclick="getId(\'' . $fname . '\', \'' . $age . '\', \'' . $sex . '\', \'' . $contactNo . '\', \'' . $type . '\', \'' . $dept . '\', \'' . $medAtt . '\', \'' . $medIll . '\', \'' . $foodAl . '\', \'' . $medAl . '\', \'' . $smkng . '\', \'' . $alc . '\')">View</button>'. '</td>';
                echo '</tr>';
            }
          ?>
      </table>
    </div>
    <div id="id01" class="modal">
      <?php 
        if (isset($_POST['param1'])) {
          $receivedData = $_POST['param1'];
          // Process the data as needed (e.g., store it in a database, perform calculations, etc.)
          // Send a response back to JavaScript
          echo "Data received by PHP: " . $receivedData;
        } else {
          // If data is not received, send an error response
          echo "Error: Data not received by PHP";
        }
        // if(isset($_POST['confirmBTN'])) {
        //   echo $_COOKIE["appNo"]; 
        //   $status = $_POST['appointStatus'];
        //   if($status === 'Approved'){
        //     $sql = "UPDATE appointment SET appoint_Status = '$status' WHERE appoint_No = '$scriptTag'";
        //     $stmt = $conn->prepare($sql);
        //     $stmt->execute();
        //     $stmt->close();
        //   }else if($status === 'Rejected'){
        //     $sql = "UPDATE appointment SET appoint_Status = '$status' WHERE appoint_No = '$scriptTag'";
        //     $stmt = $conn->prepare($sql);
        //     $stmt->execute();
        //     $stmt->close();
        //   }
        // } 
      ?>
     <form class="modal-content" action="viewpatient.php" method="post">
      <div class="contents-parent">
        <div class="contents">
          <div class="any-history-of-drinking">
            <div class="any-history-of-drinking-child"></div>
            <div class="any-history-of-container">
              <span class="any-history-of-container1">
                <p class="any-history">Any history</p>
                <p class="any-history">of Drinking?</p>
              </span>
            </div>
            <input class="any-history-of-drinking-item" type="text" id="alc" disabled/>
            <div class="any-history-of-drinking-inner"></div>
          </div>
          <div class="any-history-of-smoking">
            <div class="any-history-of-drinking-child"></div>
            <div class="any-history-of-container">
              <span class="any-history-of-container1">
                <p class="any-history">Any history</p>
                <p class="any-history">of Smoking?</p>
              </span>
            </div>
            <input class="any-history-of-drinking-item" type="text" id="smk" disabled/>
            <div class="any-history-of-drinking-inner"></div>
          </div>
          <div class="allergies-in-medicine2">
            <div class="allergies-in-medicine-item"></div>
            <div class="allergies-in-medicine3">Allergies in Medicine</div>
            <input class="allergies-in-medicine-inner" type="text" id="medAl" disabled/>
            <div class="rectangle-div"></div>
          </div>
          <div class="allergies-in-food2">
            <div class="allergies-in-food-item"></div>
            <div class="allergies-in-medicine3">Allergies in Food</div>
            <input class="allergies-in-food-inner" type="text" id="foodAl" disabled/>
            <div class="rectangle-div"></div>
          </div>
          <div class="medical-illness1">
            <div class="medical-illness-child"></div>
            <div class="allergies-in-medicine3">Medical Illness</div>
            <input class="medical-illness-item" type="text" id="medIll" disabled/>
            <div class="rectangle-div"></div>
          </div>
          <div class="needs-medical-attention4">
            <div class="needs-medical-attention-child3"></div>
            <div class="allergies-in-medicine3">Needs Medical Attention?</div>
            <input class="rectangle-input" type="text" id="medAtt" disabled/>
            <div class="rectangle-div"></div>
          </div>
          <div class="contact-no">
            <div class="contact-no-child"></div>
            <input class="contact-no-item" type="text" id="contactNo" disabled/>
            <div class="rectangle-div"></div>
            <div class="contact-no1">Contact No.</div>
          </div>
          <div class="department2">
            <div class="any-history-of-drinking-child"></div>
            <div class="department3">Department</div>
            <input class="department-inner" type="text" id="dept" disabled/>
            <div class="department-child1"></div>
          </div>
          <div class="patient-type2">
            <div class="any-history-of-drinking-child"></div>
            <div class="patient-type3">Patient Type</div>
            <input class="department-inner" type="text" id="type" disabled/>
            <div class="department-child1"></div>
          </div>
          <div class="sex2">
            <div class="sex-inner"></div>
            <div class="sex3">Sex</div>
            <input class="age-inner" type="text" id="sex" disabled/>
            <div class="sex-child2"></div>
          </div>
          <div class="age2">
            <div class="age-item"></div>
            <div class="sex3">Age</div>
            <input class="age-inner" type="text" id="age" disabled/>
            <div class="sex-child2"></div>
          </div>
          <div class="full-name2">
            <div class="full-name-item"></div>
            <input class="full-name-inner" type="text" id="name" disabled/>
            <div class="rectangle-div"></div>
            <div class="contact-no1">Full Name</div>
          </div>
        </div>
        <div class="patient-details">Patient Details</div>
        <button class="confirmbtn" type="submit" name="confirmBTN">
          <div class="confirmbtn-child"></div>
          <div class="confirm">Confirm</div>
        </button>
        <div class="appointment-status">
          <div class="appointment-status-child"></div>
          <div class="appointment-status1">Appointment Status</div>
          <select class="appointment-status-item" name="appointStatus" required>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
          </select>
        </div>
        <div class="header3">
          <div class="view-patient">View Patient</div>
          <div class="header-child"></div>
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
      </div>
     </form>
    </div>
    <script>
      function dbPage(){
        window.location.href = 'index.php';
      }
    //   function viewAppointPage(){
    //     window.location.href = 'viewappointment.php';
    //   }
       function selfPage(){
         window.location.href = 'viewpatient.php';
       }
    //   function transactPage(){
    //     window.location.href = 'transaction.php';
    //   }
        function getId(fname, age, sex, contactNo, type, dept, medAtt, medIll, foodAl, medAl, smk, alc){
          var element = document.getElementById("id01");
          if (element) {
            element.style.display = "block";
          }
          document.getElementById('name').value = fname;
          document.getElementById('age').value = age;
          document.getElementById('sex').value = sex;
          document.getElementById('contactNo').value = contactNo;
          document.getElementById('type').value = type;
          document.getElementById('dept').value = dept;
          document.getElementById('medAtt').value = medAtt;
          document.getElementById('medIll').value = medIll;
          document.getElementById('foodAl').value = foodAl;
          document.getElementById('medAl').value = medAl;
          document.getElementById('smk').value = smk;
          document.getElementById('alc').value = alc;
        }
    </script>
  </body>
</html>
