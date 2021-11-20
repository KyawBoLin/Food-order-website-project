<?php
    include_once("gem/header.php");

    // insert FAQ to database

    if(isset($_POST['submit'])){
        $question = $_POST['question'];
        $answer=$_POST['answer'];
        $type = $_POST['type'];

        $result = insertFaq($question,$answer,$type);
        if($result=='ok'){
            setSession('faq',"<div style='color:green; margin-bottom:20px;'>Data insert is successful.</div>");
            header("Location:faq.php?tag=customer");
        }
        $msg="";
        switch($result){
            case "ok":$msg = "Data insert is successful.";break;
            case "not":$msg= "Data insert is unsuccessful.";break;
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
<!-- Add FAQ  -->
        <div class="con">
            <div class="conTitle bold" style="color:royalblue">Add FAQ</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:1100px">
                    <tr>
                        <td><strong>Question :</strong></td>
                        <td>
                            <textarea class="form-control ques" placeholder="Question for customer" name="question"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Answer :</strong></td>
                        <td>
                            <textarea class="form-control ans" placeholder="Answer for customer" name="answer" id="editor"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Category :</strong></td>
                        <td>
                            <div class="form-group t-w">
                                <select class="form-control" name="type">
                                    <option value="0">Click Me</option>
                                    <option value="1">Help Center</option>
                                    <option value="2">How to Buy</option>
                                    <option value="3">About Delivery</option>
                                    <option value="4">Payment</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="submit" class="btn btn-primary ra">Confirm</button>
                            <button type = "cancle" name="cancle" class="btn btn-light">Cancle</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
<!--  Add FAQ  -->
<?php
    include_once("gem/footer.php");
?>