<?php
    include_once("gem/header.php");
    
    if(isset($_POST['submit'])){
        $title = $_POST['title'];

        $feature="";
        if(isset($_POST['feature'])){
            $feature = $_POST['feature'];
        }else{
            $feature="not show";
        }

        $order="";
        if(isset($_POST['order'])){
            $order=$_POST['order'];
        }else{
            $order='not yet';
        }

        $new_image_name="";
        if(isset($_FILES['file'])){
            if($_FILES['file']['name']!=null){
                $image_name = $_FILES['file']['name'];
                //$image_ext = end(explode('.',$image_name));         // eg. ".jpg" error
                $new_image_name ="Food_order_".rand(000,999)."_".$image_name;     // eg. Food_order_152562265.jpg
                $image_path = $_FILES['file']['tmp_name'];
                $image_folder = "../img/category/".$new_image_name;
                
                $img = move_uploaded_file($image_path,$image_folder);
            }else{
                setSession('noUploadImg',"<div style='color:red; margin-bottom:20px;'>You did't upload image yet.</div>");
            } 
        }
        
        $msg="";
        $result = insertCategory($title,$new_image_name,$feature,$order);
        if($result=='ok'){
            setSession('category',"<div style='color:green; margin-bottom:20px;'>Data insert is successful.</div>");
            header('Location:category.php?tag=category');
        }
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
        header('Location:category.php?tag=category');
    }

?>
<style>
    .ra{
        margin-right:20px;
    }
</style>
<!-- Add Category  -->
        <div class="con">
            <div class="conTitle bold" style="color:royalblue">Add Category</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Title :</strong></td>
                        <td><input type="text" name="title" placeholder="Title" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td><strong>Images :</strong></td>
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
                        <td><strong>Order :</strong></td>
                        <td>
                            Ok :  <input type="radio" name="order" value="ok" class="form-check-input ra"/>
                            Not yet :  <input type="radio" name="order" value="not yet" class="form-check-input ra" checked/>
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