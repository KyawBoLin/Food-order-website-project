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
            <div class="conTitle bold">Customer's Messages</div>
            <?php
                if(checkSession('deleteMessage')){
                    echo $_SESSION['deleteMessage'];
                    unsetSession('deleteMessage');
                }
            ?>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $result = getData('tbl_message');
                        $list="";
                        while($row = mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $username = $row['username'];
                            $title = $row['title'];
                            $date = $row['date'];
                            $status = $row['status'];
                            ?>
                                <tr>
                                    <td><?php echo $list;?> .</td>
                                    <td><?php echo $username;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $date;?></td>
                                    <td><?php
                                    if($status=="new"){
                                        echo "<span style='color:royalblue; font-weight:bold; font-size:15px;'>".$status."</span>";
                                    }else{
                                        echo "<span style='color:green; font-weight:bold; font-size:15px;'>".$status."</span>";
                                    }
                                    ?></td>
                                    <td>
                                        <a href="messageShow.php?tag=customer&id=<?php echo $id; ?>" class="btn-sm btn-info">show</a>
                                        <a href="gem/deleteMessage.php?id=<?php echo $id;?>" class="btn-sm btn-danger">delete</a>
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