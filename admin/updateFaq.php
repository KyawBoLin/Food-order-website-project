<?php
    include_once("gem/header.php");

    // get method for FAQ
    $id="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = showData($id,'tbl_faq');
        if(mysqli_num_rows($result)==0){
            header("Location:faq.php?tag=customer");
        }
        foreach($result as $data){
            $question = $data['question'];
            $answer = $data['answer'];
            $type = $data['type'];
        }
    }

    // update FAQ

    if(isset($_POST['submit'])){
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $type = $_POST['type'];

        $result=updateFaq($id,$question,$answer,$type);
        if($result=='ok'){
            setSession('updateFaq',"<div style='color:green; margin-bottom:20px;'>Data update is successful.</div>");
            header("Location:faq.php?tag=customer");
        }
        $msg="";
        switch($result){
            case "ok":$msg = "Data update is successful.";break;
            case "not":$msg= "Data update is unsuccessful.";break;
            default:;
        }

        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";
    }

    if(isset($_POST['cancle'])){
        header("Location:faq.php?tag=customer");
    }
?>

<style>
    .ra{
        margin-right:20px;
    }
    .t-w{
        width:130px;
    }
    .ques{
        width:600px;
    }
    .ans{
        width:600px;
        height:200px;
    }
</style>
<!-- Update FAQ  -->
        <div class="con">
            <div class="conTitle bold" style="color:royalblue">Update FAQ</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:1100px">
                    <tr>
                        <td><strong>Question :</strong></td>
                        <td>
                            <textarea class="form-control ques" placeholder="Question for customer" name="question"><?php echo $question; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Answer :</strong></td>
                        <td>
                            <textarea class="form-control ans" placeholder="Answer for customer" name="answer" id="editor"><?php echo $answer; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Food Category :</strong></td>
                        <td>
                            <div class="form-group t-w">
                                <select class="form-control" name="type">
                                    <option value="0">Click Me</option>
                                    <option value="1" <?php
                                    if($type==1){
                                        echo "selected";
                                    }
                                    ?>>Help Center</option>
                                    <option value="2" <?php
                                    if($type==2){
                                        echo "selected";
                                    }
                                    ?>>How to Buy</option>
                                    <option value="3" <?php
                                    if($type==3){
                                        echo "selected";
                                    }
                                    ?>>About Delivery</option>
                                    <option value="4" <?php
                                    if($type==4){
                                        echo "selected";
                                    }
                                    ?>>Payment</option>
                                    <option value="5" <?php
                                    if($type==5){
                                        echo "selected";
                                    }
                                    ?>>Privacy</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="submit" class="btn btn-primary ra">Update</button>
                            <button type = "cancle" name="cancle" class="btn btn-light">Cancle</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
<!--  Update FAQ  -->

<?php
    include_once("gem/footer.php");
?>