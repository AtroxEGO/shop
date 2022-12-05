<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="assets/icona.ico" type="image/x-icon">
    <title>Paul's Shop</title>
    <?php 
    include "db-connect.php"; 
    session_start();
    $logged_in = false;
    $admin = false;
    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
        $logged_in=true;
        $userID = $_SESSION['id'];
        $sql = "SELECT * FROM admins WHERE user_id=$userID";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $admin = true;
        }else{
            header("Location: login.php?error=You aren't an admin!");
        }
}
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
            if($logged_in){
                if($admin){
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
    <div class="containerMain">
                <div class="uploadForm">
                    <form method="post" action="uploadHandler.php" enctype="multipart/form-data">
                    <?php
                        if(isset($_GET['error'])) { ?>
                            <p class="error"> <?php echo $_GET['error']; ?></p>    
                        <?php } ?>
                        <div class="texts">
                            <input type="text" class="input" name="uploadName" id="uploadName" placeholder="Item Name">
                            <input type="text" class="input" name="uploadPrice" id="uploadPrice" placeholder="Item Price">
                        </div>
                        <input type="file" name="choosefile" value="" id="imageUpload">
                        <button type="submit" class="submit" name="confirmUpload"><span class="check-fill material-symbols-outlined">check_circle</span></button>
                    </form>
                </div>
    </div>
</body>
</html>