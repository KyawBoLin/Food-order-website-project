<?php
    include_once("gem/header.php");
?>
<style>
    table{
        width:1000px;
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
            <div class="conTitle bold">Customer Feedback</div>
            <?php
                if(checkSession('feedback')){
                    echo $_SESSION['feedback'];
                    unsetSession('feedback');
                }
                if(checkSession('feedback_delete')){
                    echo $_SESSION['feedback_delete'];
                    unsetSession('feedback_delete');
                }
            ?>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>Customer Id</th>
                        <th>Feedback Message</th>
                        <th>Date and Time</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        // get data from tbl_feedback 

                        $result = getData("tbl_feedback");
                        $list=0;
                        while($row=mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $message = $row['msg'];
                            $date = $row['date'];
                            $featured = $row['featured'];
                            
                            ?>

                            <tr>
                                <td><?php echo $list;?></td>
                                <td><?php echo $message;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $featured;?></td>
                                <td>
                                    <a href="updateFeedback.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-primary">Update</a>
                                    <a href="gem/deleteFeedback.php?id=<?php echo $id;?>&tag=customer" class="btn-sm btn-danger">Delete</a>
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