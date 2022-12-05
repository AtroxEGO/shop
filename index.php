<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="assets/icona.ico" type="image/x-icon">
    <title>Paul's Shop</title>
    <?php 
    include "db-connect.php"; 
    $sortingType = "ASC";
    $sortingCollumn = "product_id";
    ?>
</head>
<body>
    <header>
        <div class="shopInfoLeft"><a href="index.php">
            <span class="material-symbols-outlined" id="shopLogo">store</span>
            <span id="shopName">Paul's Shop</span></a>
        </div>
        <div class="searchBar">
            <input type="text" name="searchBar" id="searchBar" onkeyup="searchBarHandler()" placeholder="What are you looking for?">
            <!-- <select name="sorting" id="sortingSelect">
                <option value="default">Default</option>
                <option value="descending">By Name Desc</option>
                <option value="ascending">By Name Asc</option>
            </select> -->
        </div>
        <div class="accountInfo">
            <?php
            session_start();
            $logged_in = false;
            if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
                $logged_in=true;
                $userID = $_SESSION['id'];
            }
            if($logged_in){
                $sql = "SELECT * FROM admins WHERE user_id=$userID";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) === 1){
                echo '<span class="material-symbols-outlined" id="NFTs"><a href="addNFT.php">cloud_upload</a></span>';
                }
                echo '<span class="material-symbols-outlined" id="NFTs"><a href="account.php?account='.$_SESSION['id'].'">apps</a></span>';
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
    <div class="itemsContainer">
        <div class="itemCardContainer">
            <!-- <div class="itemFrame">
                <div class="itemImage" style="background-image: url('assets/524.png')";></div>
                <div class="itemBottom">
                        <div class="itemName">#524</div>
                        <div class="itemPrice">4.21 <img class="eth-symbol" src="assets/eth-white.png"></div>
                        <div class="buyButton"><a href="buy.php">Buy Now!</a></div>
                    </div>
                </div> -->
                <?php
        $sql = "SELECT * FROM products ORDER BY $sortingCollumn ASC ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_image = "assets/".$row['product_image'];
            if($logged_in) $buy_link = "'buy.php?id=$product_id'";
            else $buy_link = "login.php?error=You%20Must%20Login%20First";
        echo "<div class='itemFrame'>";
            echo "<div class='itemImage' style='background-image: url($product_image)'></div>";
            echo "<div class='itemBottom'>";
            echo    "<div class='itemName'>".$product_name."</div>";
            echo "<div class='itemPrice'><span class='itemPriceValue'>".$product_price."</span><img class='eth-symbol' src='assets/eth-white.png'></div>";
            echo "<div class='itemRealPrice'><span class='material-symbols-outlined'>downloading</span></div>";
            echo "<div class='buyButton'><a href=$buy_link>Buy Now!</a></div>";
            echo "</div>";
            echo "</div>";
        }
        if(isset($_GET['prompt'])){
            $productID = $_GET['prompt'];
            $sql = "SELECT * FROM products WHERE product_id='$productID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        echo    '<div class="indexPromptContainer"><div class="indexPrompt">You Bought '.$row['product_name'].'</div></div>';
        }
            ?>
    </div>
</div>
    <script src="apiRequests.js"></script>
    <script src="script.js"></script>
</body>
</html>