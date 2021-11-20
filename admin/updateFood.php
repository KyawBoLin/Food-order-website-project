<?php
    include_once("gem/header.php");

    // Current food information with get method
    
    $id="";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result = showData($id,'tbl_food');
        if(mysqli_num_rows($result)==0){
            header("Location:food.php?tag=food");
        }
        foreach($result as $data){
            $title = $data['title'];
            $description = $data['description'];
            $price = $data['price'];
            $image_name = $data['image_name'];
            $category_id = $data['category_id'];
            $featured=$data['featured'];
            $active = $data['active'];
        }
    }

    // update information with post method

    if(isset($_POST["submit"])){
        $titleNew = $_POST["title"];
        $descriptionNew = $_POST['desc'];
        $priceNew = $_POST['price'];
        $typeNew = $_POST['type'];
        $featuredNew = $_POST['feature'];
        $activeNew = $_POST['order'];
        $new_image_name="";
        if($_FILES['file']['name']!=null){
            if(isset($_FILES['file'])){
                if($_FILES['file']['name']!=null){
                    $currentImg = $_FILES['file']['name'];
                    $new_image_name="Food_order_".rand(000,999)."_".$currentImg;
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $path = "../img/food/".$new_image_name;

                    if($image_name!=null){
                        $removeImg = unlink('../img/food/'.$image_name);
                        if($removeImg!=1){
                            setSession('removeImg',"<div style='color:red; margin-bottom:20px;'>Image upload is not successful.</div>");
                            header('Location:food.php?tag=food');
                            die();
                        };
                    }

                    // upload image
                    move_uploaded_file($tmp_name,$path);

                }else{
                    $new_image_name = $_POST['oldFile'];
                }
            }
        }else{
            $new_image_name = $_POST['oldFile'];
        }

        $result = updateFood($id,$titleNew,$descriptionNew,$priceNew,$new_image_name,$typeNew,$featuredNew,$activeNew);
        if($result=='ok'){
            setSession('update',"<div style='color:green; margin-bottom:20px;'>Data update is successful.</div>");
            header("Location:food.php?tag=food");
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
        header('Location:food.php?tag=food');
    }
?>

<style>
        .ra{
            margin-right:20px;
        }
        .pri{
            width:130px;
            margin-right:10px;
        }
        .price-c{
            display:flex;
            flex-direction: row;
        }
        .kyat{
            margin-top:10px;
        }
        td{
            width:390px;
        }
        .t-w{
            width:100px;
        }
        img{
            width:150px;
            border-radius:7px;
            height:100px;
        }
    </style>
    <!-- Update Food  -->
            <div class="con">
                <div class="conTitle bold" style="color:royalblue">Update Food</div>
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <table style="width:600px">
                        <tr>
                            <td><strong>Title :</strong></td>
                            <td><input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $title; ?>"/></td>
                        </tr>
                        <tr>
                            <td><strong>Description :</strong></td>
                            <td><textarea type='text' name='desc' placeholder="Ingredients" class="form-control" rows="5"><?php echo $description; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><strong>Price :</strong></td>
                            <td class="price-c"><input type="number" name="price" class="form-control pri" placeholder="Value" value="<?php echo $price; ?>"/><span class='kyat'>- MMK</span></td>
                        </tr>
                        <tr>
                            <td><strong>Image upload :</strong></td>
                            <td>
                                <input type="file" name="file" class="form-control"/>
                                <input type="hidden" name="oldFile" value="<?php echo $image_name; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <img src="<?php echo IMG_URL;?>food/<?php echo $image_name; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Food Category :</strong></td>
                            <td>
                                <div class="form-group t-w">
                                    <select class="form-control" name="type">
                                        <!-- <option value="0">Click Me</option> -->
                                        <?php
                                            $result = foodCategory();
                                            foreach($result as $option){
                                                $id = $option['id'];
                                                $title = $option['title'];
                                                $select="";
                                                if($id==$category_id){
                                                    $select = "selected";
                                                }
                                                echo "<option value=$id $select>$title</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Feature :</strong></td>
                            <td>
                                Show :  <input type="radio" name="feature" value="show" class="form-check-input ra" <?php if($featured=='show') echo 'checked'; ?>/>
                                Don't show :  <input type="radio" name="feature" value="not show" class="form-check-input ra" <?php if($featured=='not show') echo 'checked'; ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Order :</strong></td>
                            <td>
                                Ok :  <input type="radio" name="order" value="ok" class="form-check-input ra" <?php if($active=='ok')echo 'checked'; ?>/>
                                Not yet :  <input type="radio" name="order" value="not yet" class="form-check-input ra" <?php if($active=='not yet')echo 'checked'; ?>/>
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
    <!-- Update Food  -->
    
<?php
    include_once("gem/footer.php");
?>