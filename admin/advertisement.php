<?php
    include_once("gem/header.php");
?>

<style>
    img{
        width:200px;
        border-radius:7px;
        height:350px;
    }
    th{
        border-right:4px solid rgb(216, 216, 216);
    }
    tr,td{
        padding:30px;
        text-align:center;
    }
</style>

<!-- manage advertisement  -->

<div class="con">
    <div class="conTitle bold">Manage Advertisement</div>
    <?php

        if(checkSession('adver')){
            echo $_SESSION['adver'];
            unsetSession('adver');
        }

        if(checkSession('delImg')){
            echo $_SESSION['delImg'];
            unsetSession('delImg');
        }

        if(checkSession('updateImg')){
            echo $_SESSION['updateImg'];
            unsetSession('updateImg');
        }
    ?>
    <a href="addAdvertisement.php?tag=adverTag" class="btn-sm btn-primary">Add Advertisement</a>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Images</th>
                        <th>Feature</th>
                        <th>Action</th>
                    </tr>

                    <!-- get data from database -->

                    <?php
                        $result = getData("tbl_advertisement");
                        $list=0;
                        while($row=mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];

                            ?>

                            <tr>
                                <td><?php echo $list; ?>.</td>
                                <td>
                                    <?php
                                        if($image_name==""){
                                            echo "<span style='color:red'>Not image found</span>";
                                        }else{
                                            echo "<img src='".IMG_URL."adver/$image_name'/>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td>
                                    <a href='updateAdvertisement.php?id=<?php echo $id; ?>&tag=adverTag' class='btn-sm btn-primary'>Update</a>
                                    <a href='gem/deleteAdver.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>' class='btn-sm btn-danger'>Delete</a>
                                </td>
                            </tr>

                            <?php
                        }
                    ?>
                    
                </table>
            </div>
        </div>

<!-- manage advertisement  -->

<?php
    include_once("gem/footer.php");
?>