<?php
    include_once("gem/header.php");
    $id="";
    $old_image_name="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $result = showData($id,'tbl_advertisement');
        if(mysqli_num_rows($result)==0){
            header("Location:advertisement.php?tag=adverTag");
        }
        foreach($result as $data){
            $old_image_name = $data['image_name'];
            $featured=$data['featured'];
        }
    }

    // update data 

    if(isset($_POST['submit'])){
        $featured=$_POST['feature'];
        $new_image="";
        if($_FILES['file']['name']==null){
            $new_image = $_POST['old'];
        }else{
            if(isset($_FILES['file'])){
                if($_FILES['file']['name']!=null){

                    $delOldImg = unlink("../img/adver/".$old_image_name);
                    if($delOldImg!=1){
                        setSession('updateImg',"<div style='color:red; margin-bottom:20px;'>Update is not successful.</div>");
                        header("Location:advertisement.php?tag=adverTag");
                        die();
                    }

                    $image_name = $_FILES['file']['name'];
                    $new_image = "Food_order_".rand(0000,9999).$image_name;
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $destination = "../img/adver/".$new_image;

                    $uploadImg = move_uploaded_file($tmp_name,$destination);
                }else{
                    $new_image = $_POST['old'];
                }
            }
        }

        $updateResult = updateAdver($id,$new_image,$featured);
        if($updateResult=='ok'){
            setSession('updateImg',"<div style='color:green; margin-bottom:20px;'>Updated successfully.</div>");
            header("Location:advertisement.php?tag=adverTag");
        }
        $msg="";
        switch($updateResult){
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
        header("Location:advertisement.php?tag=adverTag");
    }
?>

<style>
    .ra{
        margin-right:20px;
    }
    img{
        width:150px;
        border-radius:7px;
        height:200px;
    }
</style>

<!-- Add Category  -->
<div class="con">
            <div class="conTitle bold" style="color:royalblue">Update Poster</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Image :</strong></td>
                        <td>
                            <input type="file" name="file" class="form-control"/>
                            <input type="hidden" name="old" value="<?php echo $old_image_name; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <img src="<?php echo IMG_URL;?>adver/<?php echo $old_image_name;?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Feature :</strong></td>
                        <td>
                            Show :  <input type="radio" name="feature" value="show" class="form-check-input ra" <?php
                            if($featured=='show'){
                                echo "checked";
                            }
                            ?>/>
                            Don't show :  <input type="radio" name="feature" value="not show" class="form-check-input ra" <?php
                            if($featured=='not show'){
                                echo "checked";
                            }
                            ?>/>
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
<!-- Add Category  -->

<?php
    include_once("gem/footer.php");
?>