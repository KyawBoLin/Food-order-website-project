<?php
    include_once("gem/header.php");
    include_once("gem/authenticate.php");

    if(isset($_POST['submit'])){
        $fullName = $_POST['fullname'];
        $userName = $_POST['username'];
        $password = $_POST['password'];

        $result = authentication($fullName,$userName,$password);
        if($result=="Register is successful."){
            setSession('username',$userName);
            header('Location:manage.php?tag=admin');
        }
        $msg="";
        switch($result){
            case "This email already registered.":$msg = "This email already registered.";break;
            case "Register is successful.":$msg = "Register is successful.";break;
            case "Register is unsuccessful.":$msg = "Register is unsuccessful.";break;
            case "user":$msg = "Warning , Authentication checking is fail and please try again ! username is invalid.";break;
            case "pass":$msg ="Warning , Authentication checking is fail and please try again ! password is invalid.";break;
            default: ;
        }
        
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";
    }
?>

<!-- add admin  -->
        <div class="con">
            <div class="conTitle bold" style="color:royalblue">Add Admin</div>
            <form action="<?php '$_PHP_SELF' ?>" method="post" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Full Name :</strong></td>
                        <td><input type="text" name="fullname" placeholder="Name" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td><strong>Username :</strong></td>
                        <td><input type="username" name="username" placeholder="eg . username@gmail.com" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td><strong>Password :</strong></td>
                        <td><input type="password" name="password" placeholder="eg . Axxaxx1xx!" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="submit" class="btn-sm btn-primary">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
<!-- add admin  -->


<?php
    include_once("gem/footer.php");
?>