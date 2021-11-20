<?php 
    include_once('gem/dbFunction.php');
    include_once('gem/authenticate.php');
    include_once('gem/session.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        .con{
            width:80%;
            margin:0 auto;
        }
        .font{
            font-family:Calibri;
        }
        .imgCon{
            text-align:center;
        }
        .logo{
            width:100px;
        }
        .logoFont{
            font-family: 'Josefin Slab', serif;
            font-weight: 600;
            color:rgb(235, 6, 6);
        }
        .name{
            margin-top:-30px;
        }
        .loginCon{
            width:50%;
            margin:20px auto;
        }
        fieldset{
            border:1.8px solid grey;
            border-radius:7px;
        }
        legend{
            font-size:15px;
            width:90px;
            margin-left:10px;
            color:grey;
        }
        table{
            width:400px; 
            margin:20px auto; 
            height:220px;
        }
        .add{
            font-size:12px;
            margin-bottom:20px;
            text-align:center;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $result = authentication_login($username,$password);
            if($result == 'ok'){
                setSession('login','<div style="color:green; margin-bottom:20px;">Login successful.</div>');
                header('Location:admin.php?tag=home');
            }
            $msg='';
            switch($result){
                case 'user':$msg='Username is invalid.';break;
                case 'pass':$msg='Password is invalid.';break;
                case 'not':$msg='Login unsuccessful.';break;
                default:;
            }
            echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";
        }
    ?>
    <div class="con">
        <div class="imgCon">
            <img src="../img/food logo.png" class="logo"/>
            <div class="logoFont name">DooMoodle</div>
        </div>
        <div class="loginCon">
            <fieldset>
                <legend>Admin Panel</legend>
                <h2 class="text-center font">Sign in</h2>
                <h5 class="text-center font">To continue to Manage Admin</h5>
                <form action="" method="post" class="form">
                    <table class="font">
                        <tr>
                            <td>
                                <h5>Username : </h5>
                            </td>
                            <td>
                                <input type="username" name="username" placeholder="Username" class="form-control"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Password : </h5>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Password" class="form-control"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-primary" name="submit">Login</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="add">DooMoodle @ created by <a href="#">Kyaw Bo Lin</a></div>
            </fieldset>
        </div>
    </div>
</body>
</html>

