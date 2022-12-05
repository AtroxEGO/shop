                    <?php
                    include "db-connect.php";
                    session_start();
                        if (isset($_POST['uploadName']) && isset($_POST['uploadPrice']) && isset($_POST['confirmUpload'])) {
                            $filename = $_FILES["choosefile"]["name"];
                            $tempname = $_FILES["choosefile"]["tmp_name"];
                            $folder = "assets/".$filename;
                            $itemName = $_POST["uploadName"]  ;   
                            $itemPrice = $_POST["uploadPrice"];
                            if(empty($itemName)){
                                header ("Location: addNFT.php?error=Name cannot be empty!");
                                exit();
                            }
                            else if(empty($itemPrice)){
                                header ("Location: addNFT.php?error=Price cannot be empty!");
                                exit();
                            }elseif(empty($filename)){
                                header ("Location: addNFT.php?error=File cannot be empty!");
                                exit();
                            }
                            
                            $sql = "INSERT INTO products VALUES (null,'$itemName','$itemPrice','$filename')";
                            mysqli_query($conn, $sql);   
                            move_uploaded_file($tempname, $folder);
                            header ("Location: addNFT.php?error=Item Uploaded!");
                            exit();
                    }
                    ?>