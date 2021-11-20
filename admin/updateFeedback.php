<?php
    include_once("gem/header.php");

    // get method take id
    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = showData($id,'tbl_feedback');
        if(mysqli_num_rows($result)==0){
            header('Location:updateFeedback.php?tag=customer');
        }
        foreach($result as $data){
            $message = $data['msg'];
            $date = $data['date'];
            $feature = $data['featured'];
        }
    }

    // update data

    if(isset($_POST['submit'])){
        $message = $_POST['message'];
        $date = $_POST['date'];
        $feature = $_POST['feature'];

        $result = updateFeedback($id,$message,$date,$feature);
        if($result=='ok'){
            setSession('feedback',"<div style='color:green; margin-bottom:20px;'>Data update is successful.</div>");
            header("Location:feedback.php?tag=customer");
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
        header("Location:feedback.php?tag=customer");
    }
?>

<style>
    .ra{
        margin-right:20px;
    }
    img{
        width:150px;
        border-radius:7px;
        height:100px;
    }
</style>
<!-- update Category  -->
        <div class="con">
            <div class="conTitle bold" style="color:royalblue">Update Customer Feedback</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Message :</strong></td>
                        <td><input type="text" name="message" placeholder="message" class="form-control" value='<?php echo $message ?>'/></td>
                    </tr>
                    <tr>
                        <td><strong>Date :</strong></td>
                        <td><input type="text" name="date" placeholder="date" class="form-control" value='<?php echo $date ?>'/></td>
                    </tr>
                    <tr>
                        <td><strong>Feature :</strong></td>
                        <td>
                            Show : <input type="radio" name="feature" value="show" class="form-check-input ra" 
                            <?php 
                                if($feature=='show'){
                                    echo 'checked';
                                }
                            ?>
                            />
                            Don't show : <input type="radio" name="feature" value="not show" class="form-check-input ra" 
                            <?php 
                                if($feature=='not show'){
                                    echo 'checked';
                                }
                            ?>
                            />
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
<!-- update Category  -->

<?php
    include_once("gem/footer.php");
?>