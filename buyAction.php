<?php
include "db-connect.php";
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    $logged_in=true;
}else{
    header("Location: login.php?error=You need to be logged in");
}
    if(isset($_GET['item'])){

        $id = $_GET['item'];
        
        $sql = "SELECT * FROM products WHERE product_id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $productName = $row['product_name'];
        $productPrice = $row['product_price'];
        $productImage = $row['product_image'];
        $newOwner = $_SESSION["id"];

        $sql = "INSERT INTO owned VALUES (null,'$productName','$productPrice','$productImage',$newOwner)";
        mysqli_query($conn, $sql);
        header("Location: index.php?prompt=".$id);
        exit();
    }else{
        header("Location: index.php");
        exit();
    }
?>