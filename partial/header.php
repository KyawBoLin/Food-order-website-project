<?php
    if(isset($_GET['tag'])){
        $tagName = $_GET['tag'];
    }else{
        $tagName="home";
    }

    include_once("partial/dbFunction.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food-order Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .nav{
            margin-bottom:40px;
        }
    </style>
</head>
<body>
    <!-- navigation bar -->
    <div class="nav container">
        <div class="logo">
            <img src="<?php echo IMG_URL;?>food logo.png" alt="image" class="imageLogo">
            <div class="font name">DooMoodle</div>
        </div>
        
        <div class="container1">
            <div class="hafc font" <?php
            if($tagName=='home'){
                echo "style='border-bottom:4px solid rgb(231, 119, 138);'";
            }
            ?>><a href="index.php?tag=<?php echo'home';?>">Home</a></div>
            <div class="hafc font" <?php
            if($tagName=='customer'){
                echo "style='border-bottom:4px solid rgb(231, 119, 138);'";
            }
            ?>><a href="customer.php?tag=<?php echo'customer';?>">Customer</a></div>
            <div class="hafc font" <?php
             if($tagName=='food'){
                echo "style='border-bottom:4px solid rgb(231, 119, 138);'";
            }
            ?>><a href="foodMenu.php?tag=<?php echo'food';?>">Foods</a></div>
            <div class="hafc font" <?php
             if($tagName=='contact'){
                echo "style='border-bottom:4px solid rgb(231, 119, 138);'";
            }
            ?>><a href="contact.php?tag=<?php echo'contact';?>">Contact</a></div>
         </div>
        
    </div>
    <!-- navigation bar -->

    <?php
         include_once("partial/session.php");
         session_start();
    ?>