<?php
    include '../dbconfig.php';
    if(isset($_POST['confirmBTN'])) {
        $userData = $_GET['myVar'];
        $status = $_POST['appointStatus'];
        if($status === 'Approved'){
            $sql = "UPDATE appointment SET appoint_Status = '$status' WHERE appoint_No = '$userData'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->close();
            header("location: index.php");
        }else if($status === 'Rejected'){
            $sql = "UPDATE appointment SET appoint_Status = '$status' WHERE appoint_No = '$userData'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->close();
            header("location: index.php");
        }
    } 
?>