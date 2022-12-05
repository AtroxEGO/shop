<?php
include "db-connect.php";
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    $logged_in=true;
}else{
    header("Location: login.php?error=You need to be logged in");
}
$id = $_SESSION['id'];
$ownedId = $_GET["id"];
$sql = "DELETE FROM owned WHERE owner_id = $id && owned_id = $ownedId";
mysqli_query($conn, $sql);
header("Location: account.php?account=$id");
exit();
?>