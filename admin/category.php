<?php
    include_once("gem/header.php");
?>
<style>
    img{
        width:100px;
        border-radius:7px;
        height:70px;
    }
    table{
        margin-left:-30px;
    }
    th{
        border-right:4px solid rgb(216, 216, 216);
    }
    tr,td{
        padding:10px 0;
        text-align:center;
    }
</style>
<!-- manage category  -->
        <div class="con">
            <div class="conTitle bold">Manage Category</div>
            <?php
                if(checkSession('category')){
                    echo $_SESSION['category'];
                    unsetSession('category');
                }
                if(checkSession('update')){
                    echo $_SESSION['update'];
                    unsetSession('update');
                }
                if(checkSession('noUploadImg')){
                    echo $_SESSION['noUploadImg'];
                    unsetSession('noUploadImg');
                }
                if(checkSession('delete_category')){
                    echo $_SESSION['delete_category'];
                    unsetSession('delete_category');
                }
                if(checkSession('removeImg')){
                    echo $_SESSION['removeImg'];
                    unsetSession('removeImg');
                }
            ?>
            <a href="addCategory.php?tag=category" class="btn-sm btn-primary">Add Category Menu</a>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Feature</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $result = getData('tbl_category');
                        $list="";
                        while($row = mysqli_fetch_assoc($result)){
                            $id=$row['id'];
                            $title=$row['title'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                            $list++;
                            echo "<tr>";
                            echo "<td>".$list."</td>";
                            echo "<td>".$title."</td>";
                            ?>
                            <td>
                                <?php 
                                    if($image_name==""){
                                        echo "<span style='color:red'>Not image found.</span>";
                                    }else{
                                        echo "<img src='".IMG_URL."category/$image_name'/>";
                                    }
                                ?>
                            </td>
                            <?php
                            echo "<td>".$featured."</td>";
                            echo "<td>".$active."</td>";
                            echo "<td>
                            <a href='updateCategory.php?id=$id&tag=category' class='btn-sm btn-primary'>Update</a>
                            <a href='gem/deleteCategory.php?id=$id&image_name=$image_name' class='btn-sm btn-danger'>Delete</a>
                            </td>";
                            echo "</tr>";

                        }
                    ?>
                </table>
            </div>
        </div>
<!-- manage category  -->

 
<?php
    include_once("gem/footer.php");
?>