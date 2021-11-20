<?php
    include_once("gem/header.php");
?>
<style>
    .tableContainer{
        margin-bottom:100px;
    }
    th{
        border-right:4px solid rgb(216, 216, 216);
    }
    tr,td{
        padding:20px;
        text-align:center;
        border-bottom: 2px solid rgb(184, 184, 184);
    }
    .my{
        margin-top:10px;
    }
    .my>a{
        text-decoration: none;
    }
</style>

<!-- FAQ  -->
        <div class="con">
            <div class="conTitle bold">FAQ manage</div>
            <?php
                if(checkSession('faq')){
                    echo $_SESSION['faq'];
                    unsetSession('faq');
                }
                if(checkSession('deleteFaq')){
                    echo $_SESSION['deleteFaq'];
                    unsetSession('deleteFaq');
                }
                if(checkSession('updateFaq')){
                    echo $_SESSION['updateFaq'];
                    unsetSession('updateFaq');
                }
            ?>
            <a href="addFAQ.php?tag=customer" class="btn-sm btn-primary">Add FAQ</a>

            <!-- Help Center  -->
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Questions</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        // fetch data from tbl_faq
                        $result = getFaq(1,'tbl_faq');
                        $list="";
                        while($row=mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $question = $row['question'];
                            $type = $row['type'];

                            ?>
                                <tr>
                                    <td><?php echo $list;?>.</td>
                                    <td><?php echo $question;?></td>
                                    <td><?php
                                    if($type==1){
                                        echo "Help Center";
                                    }
                                    ?></td>
                                    <td>
                                        <div class="my"><a href="updateFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-primary">Update</a></div>
                                        <div class='my'><a href="gem/deleteFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-danger">Delete</a></div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <!-- Help Center  -->

            <!-- How to Buy  -->

            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Questions</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        // fetch data from tbl_faq
                        $result = getFaq(2,'tbl_faq');
                        $list="";
                        while($row=mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $question = $row['question'];
                            $type = $row['type'];

                            ?>
                                <tr>
                                    <td><?php echo $list;?>.</td>
                                    <td><?php echo $question;?></td>
                                    <td><?php
                                    if($type==2){
                                        echo "How to Buy";
                                    }
                                    ?></td>
                                    <td>
                                        <div class="my"><a href="updateFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-primary">Update</a></div>
                                        <div class='my'><a href="gem/deleteFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-danger">Delete</a></div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <!-- How to Buy  -->

            <!-- About Delivery  -->

            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Questions</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        // fetch data from tbl_faq
                        $result = getFaq(3,'tbl_faq');
                        $list="";
                        while($row=mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $question = $row['question'];
                            $type = $row['type'];

                            ?>
                                <tr>
                                    <td><?php echo $list;?>.</td>
                                    <td><?php echo $question;?></td>
                                    <td><?php
                                    if($type==3){
                                        echo "About Delivery";
                                    }
                                    ?></td>
                                    <td>
                                        <div class="my"><a href="updateFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-primary">Update</a></div>
                                        <div class='my'><a href="gem/deleteFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-danger">Delete</a></div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <!-- About Delivery  -->

            <!-- Payment  -->
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Questions</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        // fetch data from tbl_faq
                        $result = getFaq(4,'tbl_faq');
                        $list="";
                        while($row=mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $question = $row['question'];
                            $type = $row['type'];

                            ?>
                                <tr>
                                    <td><?php echo $list;?>.</td>
                                    <td><?php echo $question;?></td>
                                    <td><?php
                                    if($type==4){
                                        echo "Payment";
                                    }
                                    ?></td>
                                    <td>
                                        <div class="my"><a href="updateFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-primary">Update</a></div>
                                        <div class='my'><a href="gem/deleteFaq.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-danger">Delete</a></div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <!-- Payment  -->

        </div>
<!-- FAQ  -->

 
<?php
    include_once("gem/footer.php");
?>