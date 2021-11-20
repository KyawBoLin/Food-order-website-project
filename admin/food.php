<?php
    include_once("gem/header.php");
?>
<style>
    .tableContainer{
        margin-left:-110px;
    }
    table{
        width:1200px;
    }
    th{
        width:500px;
        padding:10px 0;
        text-align: center;
        border-right:4px solid rgb(216, 216, 216);
    }
    img{
        width:100px;
        border-radius:7px;
        height:70px;
    }
    tr,td{
        padding:18px 0;
        text-align:center;
    }
</style>

<!-- manage food  -->

<div class="con">
            <div class="conTitle bold">Manage Food</div>
            <?php
                if(checkSession('food')){
                    echo $_SESSION['food'];
                    unsetSession('food');
                }
                if(checkSession('noUploadImg')){
                    echo $_SESSION['noUploadImg'];
                    unsetSession('noUploadImg');
                }
                if(checkSession('removeImg')){
                    echo $_SESSION['removeImg'];
                    unsetSession('removeImg');
                }
                if(checkSession('update')){
                    echo $_SESSION['update'];
                    unsetSession('update');
                }
                if(checkSession('delete_food')){
                    echo $_SESSION['delete_food'];
                    unsetSession('delete_food');
                }
            ?>
            <a href="addFood.php?tag=food" class="btn-sm btn-primary">Add Food Menu</a>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image name</th>
                        <th>Category id</th>
                        <th>Featured</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $result = getData('tbl_food');
                        $list="";
                        while($row = mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $image_name=$row['image_name'];
                            $category_id=$row['category_id'];
                            $result2 = categoryId($category_id);
                            while($new = mysqli_fetch_assoc($result2)){
                                $category_name = $new['title'];
                            }
                            $featured=$row['featured'];
                            $active=$row['active'];

                            ?>
                                <tr>
                                    <td><?php echo $list; ?>.</td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><?php echo $price; ?> MMK</td>
                                    <td>
                                        <?php 
                                            if($image_name==""){
                                                echo "<span style='color:red'>Not image found</span>";
                                            }else{
                                                echo "<img src='".IMG_URL."food/$image_name'/>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $category_name; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="updateFood.php?id=<?php echo $id; ?>&tag=food" class="btn-sm btn-primary">Update</a>
                                        <a href="gem/deleteFood.php?id=<?php echo $id; ?>&image=<?php echo $image_name; ?>" class="btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php

                        }
                    ?>
                    
                </table>
            </div>
        </div>

<!-- manage food  -->

 
<?php
    include_once("gem/footer.php");
?>