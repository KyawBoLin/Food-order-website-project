<?php
    include_once("gem/header.php");

    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $description=$_POST['desc'];
        $price=$_POST['price'];
        $type=$_POST['type'];
        $feature=$_POST['feature'];
        $order=$_POST['order'];

        $new_image_name="";
        if(isset($_FILES['file'])){
            if($_FILES['file']['name']!=null){
                $image_name = $_FILES['file']['name'];
                $new_image_name = "Food_order_".rand(0000,9999).$image_name;    // assign new image name
                $path = $_FILES['file']['tmp_name'];
                $distinction = "../img/food/".$new_image_name;

                $upload = move_uploaded_file($path,$distinction);
            }else{
                setSession('noUploadImg',"<div style='color:red; margin-bottom:20px;'>You did't upload image yet.</div>");
            }
        }

        $result = foodInsert($title,$description,$price,$new_image_name,$type,$feature,$order);
        if($result=='ok'){
            setSession('food',"<div style='color:green; margin-bottom:20px;'>Add food is successful.</div>");
            header('Location:food.php?tag=food');
        }
        $msg="";
        switch($result){
            case 'not':$msg = 'Add food is unsuccessful.';break;
            default: ;
        }

        // show notic message

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
    </style>
    <!-- Add Food  -->
            <div class="con">
                <div class="conTitle bold" style="color:royalblue">Add Food</div>
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <table style="width:600px">
                        <tr>
                            <td><strong>Title :</strong></td>
                            <td><input type="text" name="title" placeholder="Title" class="form-control"/></td>
                        </tr>
                        <tr>
                            <td><strong>Description :</strong></td>
                            <td><textarea type='text' name='desc' placeholder="Ingredients" class="form-control" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td><strong>Price :</strong></td>
                            <td class="price-c"><input type="number" name="price" class="form-control pri" placeholder="Value"/><span class='kyat'>- MMK</span></td>
                        </tr>
                        <tr>
                            <td><strong>Image upload :</strong></td>
                            <td><input type="file" name="file" class="form-control"/></td>
                        </tr>
                        <tr>
                            <td><strong>Food Category :</strong></td>
                            <td>
                                <div class="form-group t-w">
                                    <select class="form-control" name="type">
                                        <option value="0">Click Me</option>
                                        <?php
                                            $result = foodCategory();
                                            foreach($result as $option){
                                                $id = $option['id'];
                                                $title = $option['title'];
                                                echo "<option value=$id>$title</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </td>
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
    <!-- Add Food  -->
    
<?php
    include_once("gem/footer.php");
?>