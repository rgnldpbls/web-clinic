<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Register</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/register2.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
    />
  </head>
  <body>
    <?php
      session_start();
      if(isset($_POST['register'])){
        include 'dbconfig.php';
        if(!empty($_SESSION['register']['imageData'])){
          $imageData=$_SESSION['register']['imageData'];
          $name=$_SESSION['register']['name'];
          $address=$_SESSION['register']['address'];
          $city=$_SESSION['register']['city'];
          $age=$_SESSION['register']['age'];
          $birthDate=$_SESSION['register']['birthDate'];
          $sex=$_SESSION['register']['sex'];
          $contactNumber=$_SESSION['register']['contactNumber'];
          $bloodType=$_SESSION['register']['bloodType'];
          $patientType=$_SESSION['register']['patientType'];
          $department=$_SESSION['register']['department'];
          $email=$_SESSION['register']['email'];
          $password=$_SESSION['register']['password'];
          $emerContactName=$_SESSION['register']['emerContactName'];
          $emerContactNum=$_SESSION['register']['emerContactNum'];
          $dateCreated = date("Y-m-d");
          $sql = "INSERT INTO patient(patient_Pic, patient_Name, patient_Address, patient_City, patient_Age, patient_Birthdate, patient_Sex, patient_ContactNo, blood_Type, patient_Type, department, patient_Email, patient_Password, emer_ContactName, emer_ContactNo, pat_DateCreated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("bsssississssssis", $imageData, $name, $address, $city, $age, $birthDate, $sex, $contactNumber, $bloodType, $patientType, $department, $email, $password, $emerContactName, $emerContactNum, $dateCreated);
          $stmt->execute();
          $stmt->close();
        }else{
          $name=$_SESSION['register']['name'];
          $address=$_SESSION['register']['address'];
          $city=$_SESSION['register']['city'];
          $age=$_SESSION['register']['age'];
          $birthDate=$_SESSION['register']['birthDate'];
          $sex=$_SESSION['register']['sex'];
          $contactNumber=$_SESSION['register']['contactNumber'];
          $bloodType=$_SESSION['register']['bloodType'];
          $patientType=$_SESSION['register']['patientType'];
          $department=$_SESSION['register']['department'];
          $email=$_SESSION['register']['email'];
          $password=$_SESSION['register']['password'];
          $emerContactName=$_SESSION['register']['emerContactName'];
          $emerContactNum=$_SESSION['register']['emerContactNum'];
          $dateCreated = date("Y-m-d");
          $sql = "INSERT INTO patient(patient_Name, patient_Address, patient_City, patient_Age, patient_Birthdate, patient_Sex, patient_ContactNo, blood_Type, patient_Type, department, patient_Email, patient_Password, emer_ContactName, emer_ContactNo, pat_DateCreated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssississssssis", $name, $address, $city, $age, $birthDate, $sex, $contactNumber, $bloodType, $patientType, $department, $email, $password, $emerContactName, $emerContactNum, $dateCreated);
          $stmt->execute();
          $stmt->close();
        }

        $medAttention = $_POST['r1'];
        $medIllness = isset($_POST['medIllness']) ? $_POST['medIllness'] : NULL;
        $foodAllergies = isset($_POST['foodAllergies']) ? $_POST['foodAllergies'] : NULL;
        $medAllergies = isset($_POST['medAllergies']) ? $_POST['medAllergies'] : NULL;
        $phSmoking = $_POST['r2'];
        $phDrinking = $_POST['r3'];
        $sql2 = "INSERT INTO medhistory(md_Attention, md_Illness, md_AllergiesFoods, md_AllergiesMeds, ph_Smoking, ph_Alcohol) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("ssssss", $medAttention, $medIllness, $foodAllergies, $medAllergies, $phSmoking, $phDrinking);
        $stmt->execute();
        $stmt->close(); 

       $last_inserted_id = $conn->insert_id;
       $sql3 = "UPDATE patient SET mdHist_Id = '$last_inserted_id' WHERE patient_Email = '$email'";
       $stmt = $conn->prepare($sql3);
       $stmt->execute();
       $stmt->close(); 
       echo "Record updated successfully";
       header("location: login.php");
      }
    ?>
    <div class="register2">
      <img class="bg-pic-icon1" alt="" src="assets/bg-pic@2x.png" />
      <div class="base1"></div>
      <div class="logo-group">
        <img class="logo-icon1" alt="" src="assets/logo@2x.png" />
        <div class="pup-clinic-appointment1">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila1">Sta. Mesa, Manila</div>
      </div>
      <div class="medical-history">Medical History</div>
      <div class="register2-child"></div>
      <form action="register2.php" method="post">
        <div class="needs-medical-attention">
            <div class="yes">Yes</div>
            <input class="needs-medical-attention-child" type="radio" id="r1yes" name="r1" value="yes"/>
            <div class="no">No</div>
            <input class="needs-medical-attention-item" type="radio" id="r1no" name="r1" value="no" checked />
            <div class="any-history-of">Needs Medical Attention?<span style="color:red">*</span></div>
        </div>
        <div class="medical-illness">
            <div class="medical-illness1">Medical Illness</div>
            <input class="medical-illness-child" type="text" name=medIllness/>
        </div>
        <div class="allergies-in-food">
            <div class="medical-illness1">Allergies in Food</div>
            <input class="medical-illness-child" type="text" name="foodAllergies"/>
        </div>
        <div class="allergies-in-medicine">
            <div class="medical-illness1">Allergies in Medicine</div>
            <input class="medical-illness-child" type="text" name="medAllergies"/>
        </div>
        <div class="needs-medical-attention2">
            <div class="yes">Yes</div>
            <input class="needs-medical-attention-child" type="radio" id="r2yes" name="r2" value="yes" />
            <div class="no">No</div>
            <input class="needs-medical-attention-item" type="radio" id="r2no" name="r2" value="no" checked/>
            <div class="any-history-of">Any history of Smoking?<span style="color:red">*</span></div>
        </div>
        <div class="needs-medical-attention3">
            <div class="yes">Yes</div>
            <input class="needs-medical-attention-child" type="radio" id="r3yes" name="r3" value="yes"/>
            <div class="no">No</div>
            <input class="needs-medical-attention-item" type="radio" id="r3no" name="r3" value="no" checked/>
            <div class="any-history-of">Drinking Alcohol?<span style="color:red">*</span></div>
        </div>
        <button class="rectangle-group" type="submit" name="register">
            <div class="group-item"></div>
            <div class="register1">Register</div>
        </button>
      </form>
      
      <img class="register2-item" alt="" src="assets/polygon-1@2x.png" />

      <img class="bg-pic-icon2" alt="" src="assets/bg-pic@2x.png" />

      <div class="register2-inner"></div>
    </div>
  </body>
</html>
