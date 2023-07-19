<?php
include "./db_Admin.php";

$Email = $_POST['email'];
$Password = $_POST['password'];
$dept = $_POST['password'];

$sql2 = mysqli_query($conn, "INSERT INTO cits_users(email, password, dept)
VALUES('{$Email}', '{$Password}', '{$dept}')");
if($sql2){
    echo 1;  
}else{
    echo 2;
}
?>