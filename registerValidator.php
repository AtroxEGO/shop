<?php
session_start();
include "db-connect.php";


if(isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-confirm'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$fname = validate($_POST['fname']);
$lname = validate($_POST['lname']);
$email = validate($_POST['email']);
$password = validate($_POST['password']);
$passwordConfirm = validate($_POST['password-confirm']);

if(empty($username)){
    header ("Location: register.php?error=Username cannot be empty!");
    exit();
}
else if(empty($fname)){
    header ("Location: register.php?error=First Name cannot be empty!");
    exit();
}
else if(empty($lname)){
    header ("Location: register.php?error=Last Name cannot be empty!");
    exit();
}
else if(empty($email)){
    header ("Location: register.php?error=E-Mail cannot be empty!");
    exit();
}
else if(empty($password)){
    header ("Location: register.php?error=Password cannot be empty!");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$username'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) === 1){
        header("Location: register.php?error=Username already taken!");
        exit();
}
$sql = "SELECT * FROM users WHERE user_email='$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) === 1){
    header("Location: register.php?error=There is already an account with this E-Mail!");
    exit();
}
if($password !== $passwordConfirm){
    header("Location: register.php?error=Passwords aren't the same!");
    exit();
}

$sql = "INSERT INTO users (user_name, user_fname, user_lname, user_email, user_password)
VALUES ('$username', '$fname', '$lname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: register.php?error=Account Created!");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }