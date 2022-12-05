<?php

$conn = mysqli_connect("localhost", "root", "", "nftshop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>