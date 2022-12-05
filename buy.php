<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include "db-connect.php";
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="assets/icona.ico" type="image/x-icon">
    <title>Buying Page</title>
</head>
<body>
<header>
        <div class="shopInfoLeft"><a href="index.php">
            <span class="material-symbols-outlined" id="shopLogo">store</span>
            <span id="shopName">Paul's Shop</span></a>
        </div>
        <div class="searchBar">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="style2.css">
            <input type="text" name="searchBar" id="searchBar" onkeyup="searchBarHandler()" placeholder="What are you looking for?">
        </div>
        <div class="accountInfo">
            <?php
            session_start();
            $logged_in = false;
            if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
                $logged_in=true;
            }
            if($logged_in){
                ?>
                <h2>Hello, <?php echo $_SESSION['user_name']; ?></h2>
                <a href="logout.php"><span class="material-symbols-outlined" id="logoutIcon">logout</span></a>
            <?php
            } else { ?>
                <div class="accountButtons">
                <div class="login"><a href="login.php">
                <span class="material-symbols-outlined">login</span>
                Login
                </div></a>
                <div class="register"><a href="register.php">
                <span class="material-symbols-outlined">person_add</span>
                Register
                </div></a>
                </div>
            <?php } ?>
        </div>
    </header>
    <div class="container">
    <?php
    if(isset($_GET['id'])) { 
    $id = $_GET['id'];
    ?>
    <div class="buingItemCard">
        <div class="buyingItemImage" style='background-image: url(assets/524.png)'></div>
        <div class="buyingItemInfo">
        <div class="buyingItemName">#524</div>
        <div class="pricesContainer">
            <div class="prices">
                <div class="priceETH">71.71<img class='eth-symbol' id="eth-symbol" src='assets/eth-white.png'></div>
                <div class="priceUSD">111<span class='material-symbols-outlined'> attach_money</span></div>
            </div>
        </div>


    </div>
    </div>
    
    











    <?php } else { ?>
     <div class='errorInfo'>
        <p> ERROR 404 </p>
        <h7>We couldn't find the page you were looking for :(</h7>
    </div> 
     <?php } ?>
    </div>
</body>
</html>