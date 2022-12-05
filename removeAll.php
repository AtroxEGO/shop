<?php
session_start();
include "db-connect.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    $logged_in=true;
}else{
    header("Location: login.php?error=You need to be logged in");
}
$id = $_SESSION['id'];
$sql = "DELETE FROM owned WHERE owner_id = $id";
mysqli_query($conn, $sql);
header("Location: index.php");
exit();
?>