<?php
session_start();
include("./connect.php");
$gvotes = $_POST['gvotes'];
$votes = $gvotes + 1;
$gmobile =$_POST['gmobile'];

$umobile = $_SESSION['userData']['mobile'];

$insert = mysqli_query($mycon,"UPDATE voterdetails SET votes = '$votes' WHERE mobile='$gmobile'");
$update_user_status = mysqli_query($mycon, "UPDATE voterdetails SET status = 1 WHERE mobile='$umobile'");
if($insert and $update_user_status){
        $groups = mysqli_query($mycon, "SELECT * FROM voterdetails WHERE role='party'");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
        $_SESSION['userData']['status'] = 1;
        $_SESSION['groupData'] =$groupsdata;
        echo'
        <script>
        // alert("voted!!");
        window.location = "../routes/dashboard.php";
        </script>
        ';

}
else{
echo'
<script>
alert("Some error occured!!");
window.location = "../routes/dashboard.php";
</script>
';
}






?>