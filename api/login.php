<?php
session_start();
include("./connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];
$check = mysqli_query($mycon,"SELECT * FROM voterdetails WHERE mobile='$mobile' AND password='$password' AND role='$role'");
if(mysqli_num_rows($check)>0){
    $userData = mysqli_fetch_array($check,MYSQLI_ASSOC);
    $group = mysqli_query($mycon,'SELECT * FROM voterdetails WHERE role="party"');
    $groupData = mysqli_fetch_all($group,MYSQLI_ASSOC);

    $_SESSION['userData'] = $userData;
    $_SESSION['groupData'] = $groupData;

    echo '
    <script>
    // alert("Login Successful");
    window.location = "../routes/dashboard.php";
    </script>
    
    ';

}
else{
    echo '
    <script>
        alert("User Not Found");
        window.location="../index.php";
    </script>
    ';
}



?>