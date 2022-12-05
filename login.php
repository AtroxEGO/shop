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
</head>
<body>
    <header>
        <div class="shopInfoLeft"><a href="index.php">
            <span class="material-symbols-outlined" id="shopLogo">store</span>
            <span id="shopName">Paul's Shop</span></a>
        </div>
        <div class="searchBar">
            <input type="text" name="searchBar" id="searchBar" placeholder="What are you looking for?">
        </div>
        <div class="accountInfo">
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
        </div>
    </header>
        <div class="loginContainer">
            <form class="loginPrompt" method="post" action="loginValidator.php">
                <div class="loginPromptText"><span>Log in</span></div>
                <?php
                    if(isset($_GET['error'])) { ?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>    
                <?php } ?>
                <input type="text" name="username" id="login-username-input" placeholder="Username">
                <input type="password" name="password" id="login-password-input" placeholder="Password">
                <button type="submit" class="submit" id="submit2"><span class="check-fill material-symbols-outlined">check_circle</span></button>
            </form>
    <script src="script.js"></script>
</body>
</html>