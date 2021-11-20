<?php
        include_once("dbFunction.php");
        include_once("session.php");
        session_start();


        // catch get method 

        if(isset($_GET['tag'])){
            $tagName = $_GET['tag'];
        }else{
            $tagName = "home";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <style>
        .containerNav{
            display:flex;
            flex-direction: row;
            background-color: rgb(236, 108, 130);
        }
        .insideNav{
            background-color: rgb(236, 108, 130);
            padding:20px;
        }
        .insideNav>a{
            text-decoration: none;
            color:white;
        }
        .insideNav:hover{
            background-color: rgb(243, 38, 72);
        }
        .dropdown{
            position: relative;
        }
        .dropdown-content{
            position:absolute;
            display: none;
        }
        .dropdown:hover .dropdown-content{
            display:block;
            top:62px;
            left:0px;
            background-color: rgb(236, 108, 130);
        }
        .insideDrop{
            padding:20px;
        }
        .insideDrop:hover{
            background-color: rgb(243, 38, 72);
        }
        .insideDrop>a{
            text-decoration: none;
            color:white;
        }

    </style>

    <script src="../javascript/ckeditor/ckeditor.js"></script>
</head>
<body>
    <!-- navigation -->
        
    <div class="containerNav">
        <div class="insideNav" <?php
        if($tagName=='home'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="admin.php?tag=<?php echo 'home';?>">Home</a></div>
        <div class="insideNav" <?php
        if($tagName=='admin'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="manage.php?tag=<?php echo 'admin';?>">Admin</a></div>
        <div class="insideNav" <?php
        if($tagName=='category'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="category.php?tag=<?php echo 'category';?>">Category</a></div>
        <div class="insideNav" <?php
        if($tagName=='food'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="food.php?tag=<?php echo 'food';?>">Food</a></div>
        <div class="insideNav" <?php
        if($tagName=='order'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="order.php?tag=<?php echo 'order';?>">Order</a></div>
        <div class="insideNav" <?php
        if($tagName=='adverTag'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="advertisement.php?tag=<?php echo 'adverTag';?>">Advertisement</a></div>
        <div class="insideNav dropdown" <?php
        if($tagName=='customer'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="#">Customer</a>
            
            <div class="dropdown-content">
                <div class="insideDrop"><a href="feedback.php?tag=<?php echo 'customer';?>">Feedback</a></div>
                <div class="insideDrop"><a href="faq.php?tag=<?php echo 'customer';?>">FAQ</a></div>
                <div class="insideDrop"><a href="message.php?tag=<?php echo 'customer';?>">Message</a></div>
            </div>
        </div>
        <div class="insideNav dropdown" <?php
         if($tagName=='revenue'){
            echo "style='background-color:rgb(243, 38, 72); color:white'";
        }
        ?>><a href="#">Revenue&nbsp;</a>
            
            <div class="dropdown-content">
                <div class="insideDrop"><a href="sale.php?tag=<?php echo 'revenue';?>">Sales</a></div>
                <div class="insideDrop"><a href="expense.php?tag=<?php echo 'revenue';?>">Expenses</a></div>
                <div class="insideDrop"><a href="profit.php?tag=<?php echo 'revenue';?>">Profit</a></div>
            </div>
        </div>
        <div class="insideNav"><a href="gem/logout.php">Logout</a></div>
    </div>

       
    <!-- navigation -->
<?php

    // Session part 

    if(!isset($_SESSION['login'])){
        header('Location:index.php');
    }
?>