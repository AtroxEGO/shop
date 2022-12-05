<?php
session_start();
include "db-connect.php";


if(isset($_POST['username']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if(empty($username)){
    header ("Location: login.php?error=Username cannot be empty!");
    exit();
}
else if(empty($password)){
    header ("Location: login.php?error=Password cannot be empty!");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $username && $row['user_password'] === $password){
        echo "Logged In!";
        $_SESSION['user_name'] = $row["user_name"];
        $_SESSION["name"] = $row['user_fname'];
        $_SESSION['id'] = $row["user_id"];
        header("Location: index.php");
        exit();
    } else{
        header("Location: login.php?error=Incorrect Username or Password");
        exit();
    }
}else{
    header("Location: login.php?error=Incorrect Username or Password");
    exit();
}
