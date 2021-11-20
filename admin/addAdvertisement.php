<?php
    include_once("gem/header.php");

    // Add Poster

    if(isset($_POST['submit'])){
        $featured = $_POST['feature'];
        $newName="";
        if(isset($_FILES['file'])){
            
            if($_FILES['file']['name']!=null){
                $currentName=$_FILES['file']['name'];
                $newName="Food_order_".rand(0000,9999).$currentName;
                $tmpName = $_FILES['file']['tmp_name'];
                $destinationPath = "../img/adver/".$newName;

                $image_name = move_uploaded_file($tmpName,$destinationPath);
            }else{
                setSession('adver',"<div style='color:red; margin-bottom:20px;'>You did't upload image yet.</div>");
                header("Location:advertisement.php?tag=adverTag");
                die();
            }
        }

            $result = adverImgUpload($newName,$featured);
            if($result=='ok'){
                setSession('adver',"<div style='color:green; margin-bottom:20px;'>Image uploaded successfully.</div>");
                header("Location:advertisement.php?tag=adverTag");
            }
            $msg="";
            switch($result){
                case "ok":$msg = "Data upload is successful.";break;
                case "not":$msg= "Data upload is unsuccessful.";break;
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
</style>

<!-- Add Category  -->
<div class="con">
            <div class="conTitle bold" style="color:royalblue">Add Poster</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Image :</strong></td>
                        <td><input type="file" name="file" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td><strong>Feature :</strong></td>
                        <td>
                            Show :  <input type="radio" name="feature" value="show" class="form-check-input ra"/>
                            Don't show :  <input type="radio" name="feature" value="not show" class="form-check-input ra" checked/>
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