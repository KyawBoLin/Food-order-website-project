<?php
    include_once("gem/header.php");

    $id="";
    $image_name="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = showData($id,'tbl_category');
        if(mysqli_num_rows($result)==0){
            header('Location:category.php?tag=category');
        }
        foreach($result as $data){
            $title = $data['title'];
            $image_name = $data['image_name'];
            $feature = $data['featured'];
            $active = $data['active'];
        }
    }

    // update data insert into database 

    if(isset($_POST['submit'])){
        $title = $_POST['title'];

        $feature = "";
        if(isset($_POST['feature'])){
            $feature = $_POST['feature'];
        }else{
            $feature = "not show";
        }

        $order="";
        if(isset($_POST['order'])){
            $order = $_POST['order'];
        }else{
            $order="not yet";
        }

        $new_image_name="";
    
        if($_FILES['file']['name']==null){
            $new_image_name=$_POST['old'];
        }else{
            if(isset($_FILES['file'])){
                if($_FILES['file']['name']!=null){
                    $image_name_select = $_FILES['file']['name'];
                    $new_image_name = "Food_order_".rand(000,999)."_".$image_name_select;
                    $image_path = $_FILES['file']['tmp_name'];
                    $image_folder = "../img/category/".$new_image_name;
    
                    if($image_name!=null){
                        $removeImg = unlink('../img/category/'.$image_name);
                        if($removeImg!=1){
                            setSession('removeImg',"<div style='color:red; margin-bottom:20px;'>Image upload is not successful.</div>");
                            header('Location:category.php?tag=category');
                            die();
                        };
                    }

                    move_uploaded_file($image_path,$image_folder);
                   
                }else{
                    $new_image_name=$_POST['old'];
                }
            }
        }
        
        $result = updateCategory($id,$title,$new_image_name,$feature,$order);
        if($result=='ok'){
            setSession('update',"<div style='color:green; margin-bottom:20px;'>Data update is successful.</div>");
            header('Location:category.php?tag=category');
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
        header('Location:category.php?tag=category');
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
            <div class="conTitle bold" style="color:royalblue">Update Food Category</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:600px">
                    <tr>
                        <td><strong>Title :</strong></td>
                        <td><input type="text" name="title" placeholder="Title" class="form-control" value='<?php echo $title ?>'/></td>
                    </tr>
                    <tr>
                        <td><strong>Images :</strong></td>
                        <td>
                            <input type="file" name="file" class="form-control"/>
                            <input type="hidden" name="old" class="form-control" value='<?php echo $image_name; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <img src="<?php echo IMG_URL;?>category/<?php echo $image_name ?>"/>
                        </td>
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
                        <td><strong>Order :</strong></td>
                        <td>
                            Ok : <input type="radio" name="order" value="ok" class="form-check-input ra"  
                            <?php 
                                if($active=='ok'){
                                    echo 'checked';
                                }
                            ?>
                            />
                            Not yet : <input type="radio" name="order" value="not yet" class="form-check-input ra"   
                            <?php
                                if($active=='not yet'){
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