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
                echo '<span class="material-symbols-outlined" id="NFTs"><a href="account.php?account='.$_SESSION['id'].'">apps<a></span>';
                ?>
                <h2>Hello, <?php echo $_SESSION['user_name']; ?></h2>
                <a href="logout.php"><span class="material-symbols-outlined" id="logoutIcon">logout</span></a>
            <?php
            } else {
                header("Location: login.php?error=You Must Be Logged In!");
                exit();
            } ?>
        </div>
    </header>
    <div class="container">
    <?php
    if(isset($_GET['id'])) { 
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)
    ?>
    <?php
    echo "<div class='buingItemCard'>";
    echo    '<div class="buyingItemImage" style="background-image: url(assets/'.$row["product_image"].')"></div>';
    echo    '<div class="right">';
    echo        '<div class="buyingItemInfo">';
    echo            '<div class="buyingItemNameContainer">';
    echo                '<div class="buyingItemName">'.$row["product_name"].'</div>';
    echo            '</div>';
    echo            '<div class="pricesContainer">';
    echo                '<div class="prices">';
    echo                    '<div class="priceETH"><span class="itemPriceValue">'.$row["product_price"].'</span><img class="eth-symbol" id="eth-symbol" src="assets/eth-white.png"></div>';
    echo                    '<div class="priceUSD"><span class="material-symbols-outlined">downloading</span></div>';
    echo                '</div>';
    echo            '</div>';
    echo        '</div>';
    echo        '<div class="buyingItemButtonContainer">';
    echo            '<a href="buyAction.php?item='.$id.'"><div class="buyItemButton">Buy Now!</div></a>';
    echo        '</div>';
    echo    '</div>';
    echo '</div>';
    ?>
    




    
    <?php } else { ?>
     <div class='errorInfo'>
        <p> ERROR 404 </p>
        <h7>We couldn't find the page you were looking for :(</h7>
    </div> 
     <?php } ?>
    </div>
    <script src="apiRequests2.js"></script>
</body>
</html>