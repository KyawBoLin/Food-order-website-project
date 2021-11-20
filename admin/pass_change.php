<?php
    include_once("gem/header.php");
    include_once("gem/authenticate.php");

    $id="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(isset($_POST['submit'])){
        $current_pass = $_POST['current_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        $result = authentication_password($id,$current_pass,$new_pass,$confirm_pass);
        if($result == "ok"){
            setSession('change_pass','<div style="color:green; margin-bottom:20px;">Password Change successful.</div>');
            header('Location:manage.php?tag=admin');
        }
        $msg="";
        switch($result){
            case 'not':$msg='Password change is unsuccessful.';break;
            case 'Try again':$msg='Please try again, new password and confirm password are not match.';break;
            case 'current password wrong':$msg='Current password is incorrect.';break;
            case 'invalid' : $msg='Your new password is invalid.';break;
            default : ;
        }

        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";
    }
?>

<style>
    .c{
        padding:7px;
        margin-left:10px;
        color:rgb(236, 108, 130);
        font-weight:500;
    }
</style>
<!-- change password  -->

<div class="con">
            <div class="conTitle bold" style="color:royalblue">Password Change Setting</div>
            <form action="<?php '$_PHP_SELF' ?>" method="post" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Current Password :</strong></td>
                        <td><input type="password" name="current_pass" placeholder="eg . Axxaxx1xx!" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td><strong>New Password :</strong></td>
                        <td><input type="password" name="new_pass" placeholder="eg . Axxaxx1xx!" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td><strong>Confirm Password :</strong></td>
                        <td><input type="password" name="confirm_pass" placeholder="eg . Axxaxx1xx!" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="submit" class="btn-sm btn-primary">Submit</button>
                            <a href="manage.php" class="btn-sm btn-light c">Cancle</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
<!-- change password  -->