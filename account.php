<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    include "db-connect.php"; 
        if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
            $logged_in=true;
            $sessionID=$_SESSION['id'];
        }
        if(!$logged_in){
            header("Location: login.php?error=You Need To Login First");
            exit();
        }else if(isset($_GET['account'])){
            if($_GET['account'] !== $_SESSION['id']){
                header("Location: login.php?error=Not Your Account");
                exit();
            }
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="assets/icona.ico" type="image/x-icon">
    <title>Paul's Shop</title>
</head>
<body>
<header>
        <div class="shopInfoLeft"><a href="index.php">
            <span class="material-symbols-outlined" id="shopLogo">store</span>
            <span id="shopName">Paul's Shop</span></a>
        </div>
        <div class="searchBar">
            <input type="text" name="searchBar" id="searchBar" onkeyup="searchBarHandler()" placeholder="What are you looking for?">
        </div>
        <div class="accountInfo">
            <?php
            $logged_in = false;
            if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
                $logged_in=true;
            }
            if($logged_in){
                echo '<span class="material-symbols-outlined" id="NFTs"><a href="account.php?account='.$_SESSION['id'].'">apps<a></span>';
                ?>
                <h2 onClick="nameClick()">Hello, <?php echo $_SESSION['user_name']; ?></h2>
                <div class='popup' onClick='nameClick()'>Delete All NFT's?</div>
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
    <div class="ownedContainer">
        <div class="ownedTop">
            <div class="ownedText">Your Owned NFT's:</div>
            <div class="ownedRight">
                <div class="ownedValue">Total Value: <span id="totalOwnedValue">30</span><img class='eth-symbol' src='assets/eth-white.png'></div>
                <div class="ownedRealValue"><span class='material-symbols-outlined'>downloading</span></div>
            </div>
        </div>
        <div class="ownedTileContainer">
            <?php
        $sql = "SELECT * FROM owned WHERE owner_id=$sessionID";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $owned_id = $row['owned_id'];
            $owned_name = $row['owned_name'];
            $owned_price = $row['owned_price'];
            $owned_image = "assets/".$row['owned_image'];
        echo <<< EOL
        <div class='ownedItemFrame'>
        <div class='ownedItemImage' style='background-image: url($owned_image)'></div>
        <div class='ownedItemBottom'>
        <div class='ownedItemName'>$owned_name</div>
        <div class='ownedItemPrice'><span class='itemPriceValue'>$owned_price</span><img class='eth-symbol' src='assets/eth-white.png'></div>
        <div class='ownedItemRealPrice'><span class='material-symbols-outlined'>downloading</span></div>
        </div>
        </div>
        EOL;
        }
        ?>
        </div>
    </div>
    <script src="apiRequests3.js"></script>
    <script src="account.js"></script>
</body>
</html>