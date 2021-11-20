<?php

include_once("gem/header.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = showData($id,'tbl_admin');
    if(mysqli_num_rows($result)==0){
        header('Location:manage.php?tag=admin');
    }
    while($row = mysqli_fetch_assoc($result)){
        $fullName = $row['full_name'];
    }
}
?>
<style>
    .b-c{
        margin-top:20px;
    }
    .b-c>a{
        text-decoration:none;
        margin-left:10px;
    }
</style>

<!-- Confirm Delete page  -->
<div class="con">
    <div class="conTitle bold" style="color:red">Are you sure to DELETE?</div>
    <?php echo "<span>Do you want to delete admin <span style='color:red; font-size:20px;'>".$fullName."</span> account from your <span style='color:red; font-size:20px;'>Admin Page</span>?</span>"; ?>
    <div class="b-c">
        <?php 
            echo "<a href='gem/deleteData.php?id=$id' class='btn-sm btn-danger'>Delete</a>";
            echo "<a href='manage.php?tag=admin' class='btn-sm btn-light'>Cancle</a>";
        ?>
    </div>
</div>
<!-- Confirm Delete page  -->

<?php
    include_once("gem/footer.php");
?>