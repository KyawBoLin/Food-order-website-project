<?php

include_once("gem/header.php");
include_once("gem/authenticate.php");

// update data 
$id="";
$fullName1="";
$userName1="";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = showData($id,'tbl_admin');
    if(mysqli_num_rows($result)==0){
        header('Location:manage.php?tag=admin');
    }
    foreach($result as $data){
        $fullName1 = $data['full_name'];
        $userName1 = $data['username'];
    }
}

if(isset($_POST['submit'])){
    $fullName = $_POST['fullname'];
    $username = $_POST['username'];
    // $password = $_POST['password'];
    $result = updateData($id,$fullName,$username);
    if($result == "ok"){
        setSession('update','<div style="color:green; margin-bottom:20px;">Your update is successful.</div>');
        header('Location:manage.php?tag=admin');
    }
}

?>

<!-- Update admin  -->
<div class="con">
            <div class="conTitle bold" style="color:royalblue">Edit Admin</div>
            <form action="<?php '$_PHP_SELF' ?>" method="post" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Full Name :</strong></td>
                        <td><input type="text" name="fullname" placeholder="Name" class="form-control w-200" value="<?php echo $fullName1; ?>"/></td>
                    </tr>
                    <tr>
                        <td><strong>Username :</strong></td>
                        <td><input type="username" name="username" placeholder="Username" class="form-control" value="<?php echo $userName1; ?>"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="submit" class="btn-sm btn-primary">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
<!-- Update admin  -->


<?php
    include_once("gem/footer.php");
?>