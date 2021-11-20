<?php
    include_once("gem/header.php");
    error_reporting(0);

    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $messageResult = showData($id,'tbl_message');
        if(mysqli_num_rows($messageResult)==0){
            header("Location:message.php?tag=customer");
        }
        $row = mysqli_fetch_assoc($messageResult);
        $username = $row['username'];
        $email = $row['email'];
        $number = $row['number'];
        $title = $row['title'];
        $content = $row['content'];
        $date = $row['date'];
    }
    // reply message

    if(isset($_POST['reply'])){
        $to = $_POST['email'];
        $subject = $_POST['title'];
        $message = $_POST['content'];
        $header = "Content-type:text";
        $bol = mail($to,$subject,$message,$header);
        $msg="";
        if($bol){
            $msg="Reply is successful.";
            $replyResult = updateReply($id);
        }else{
            $msg = "Reply is unsuccessful.";
        }
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";
    }
    
    if(isset($_POST['back'])){
        header("Location:message.php?tag=customer");
    }
?>
<style>
    .con{
        background-color: white;
        margin:7%;
    }
    .font{
        font-family: Calibri;
    }
    .title{
        font-size:28px;
    }
    .nd{
        display:flex;
        flex-direction:row;
        justify-content:space-between;
        margin:20px 0;
        font-size:17px;
    }
    .op{
        color:rgb(157, 151, 151);
    }
    .bo{
        font-weight:bold;
    }
    .content{
        margin:50px 0;
        padding:0 20%;
    }
    
</style>
<div class="con">
    <form action="" method="post">
        <div>
            <div class="font title"><?php echo $title; ?></div>
            <input type="hidden" name="title" value="<?php echo $title; ?>">
            <div class="nd font">
                <div>
                    <span class="bo"><?php echo $username; ?> </span>
                    <span class='op'> <?php echo $email; ?></span>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                </div>
                <div class='op'><?php echo $date; ?></div>
            </div>
        </div>
        <div class="content">
            <?php echo $content; ?>
        </div>
        <input type="hidden" name="content" value="<?php echo $content; ?>">
        <div class="op">Contact : <?php echo $number; ?></div>
        <div class="my-5">
            <button class="btn btn-secondary" name="reply"> Reply </button>
            <button class="btn btn-secondary" name="back"> Back </button>
        </div>
    </form>
</div>

<?php
    include_once("gem/footer.php");
?>