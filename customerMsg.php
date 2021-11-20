<?php
    include_once('partial/header.php');
?>
<style>
.customerCon{
    margin:50px auto;
    /* background-color: royalblue; */
    width:80%;
} 
.custHeader{
    display:flex;
    flex-direction:row;
    justify-content: center;
}
.ateam{
    margin-left:15px;
    margin-top:9px;
    color:rgb(187, 181, 181);
}
table{
    text-align: left;
    /* background-color: royalblue; */
    width:50%;
}
td{
    padding:10px;
}
.inputBox{
    border:0;
    border-bottom: 1px solid rgb(187, 181, 181);
}
@media(max-width:800px){
    table{
        width:80%;
    }
}
@media(max-width:550px){
    table{
        width:80%;
    }
}
@media(max-width:374px){
    table{
        width:100%;
    }
    .custHeader{
        display:block;
    }
}
</style>
<!-- customer message  -->
<?php

// message insert into database 

if(isset($_POST['send'])){
    $username = mysqli_real_escape_string(dbConnect(),$_POST['username']);
    $email = mysqli_real_escape_string(dbConnect(),$_POST['email']);
    $number = mysqli_real_escape_string(dbConnect(),$_POST['phone']);
    $title = mysqli_real_escape_string(dbConnect(),$_POST['title']);
    $content = mysqli_real_escape_string(dbConnect(),$_POST['content']);

    $result = customerMessage($username,$email,$number,$title,$content);
    $msg="";
        switch($result){
            case "ok":$msg = "Message Sent successfully.";break;
            case "not":$msg= "Message unsuccessful.";break;
            default:;
        }

        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";

}

if(isset($_POST['cancel'])){
    header("Location:index.php?tag=home");
}
?>
    <div class="customerCon">
        <div class="custHeader">
            <h3 class="font">Customer's Message</h3><span class="ateam"> to admin team</span>
        </div>
        <form action="" method="post" class="form">
            <table>
                <tr>
                    <td><input type="username" name="username" class="inputBox form-control" placeholder="Username"></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" class="inputBox form-control" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="text" name="phone" class="inputBox form-control" placeholder="Phone number"></td>
                </tr>
                <tr>
                    <td><input type="text" name="title" class="inputBox form-control" placeholder="Title"></td>
                </tr>
                <tr>
                    <td>
                        <textarea name="content" class="inputBox form-control" rows='5' placeholder="Say Something!"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-info" name="send">Send</button>
                        <button class="btn btn-default mx-3" name="cancel">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

<!-- customer message  -->

<?php
    include_once('partial/footer.php');
?>

