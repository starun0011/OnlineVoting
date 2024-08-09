<?php
include("./connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$role = $_POST['role'];
$image = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$password = $_POST['password'];
$cPassword = $_POST['confirmPassword'];

if (strcasecmp($password, $cPassword) == 0 && $password != "") {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($mycon, "INSERT INTO voterdetails(name,mobile,role,picture,password,status,votes) VALUES ('$name','$mobile','$role','$image','$password',0,0)");
    if ($insert) {
        echo '
    <script>
        alert("Registration successful");
        window.location="../index.php";
    </script>
    ';
    }
    else{
        echo '
    <script>
        alert("Some problem occured please re-register yourself!!");
        windor.location = "../routes/register.php";
    </script>

    ';
    }
} 

else {
    echo '
    <script>
        alert("Password and Confirm password do not match!!");
        windor.location = "../routes/register.php";
    </script>

    ';
}
