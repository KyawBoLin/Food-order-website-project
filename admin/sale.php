<?php
    include_once("gem/header.php");
?>
<style>
    table{
        width:1200px;
        margin-left:-110px;
    }
    th{
        width:500px;
        padding:10px 0;
        text-align: center;
        border-right:4px solid rgb(216, 216, 216);
    }
    tr,td{
        padding:18px 0;
        text-align:center;
    }
    .checkBox{
        margin-right:7px;
    }
</style>

<?php

    // delete history

    if(isset($_POST['delete'])){
        $deleteCheckBox=$_POST['checkBoxArray'];
        $result = "";
        foreach($deleteCheckBox as $deleteData){
            $result = deleteData($deleteData,'tbl_sale');
        }
    }
?>
<!-- sale  -->
        <div class="con">
            <div class="conTitle bold">Sale History Per Month</div>
            <form action="" method="post">
               <button class="btn-sm btn-danger" name="delete">Delete History</button>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>
                            <input type = "checkbox" class="checkBox" id="selectAllBoxes">Select All
                        </th>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $result = getDataSale();
                        $list="";
                        while($row= mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $customer = $row['customer'];
                            $title = $row['food_title'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];
                            $total = $row['total'];
                            $date = $row['order_date'];
                            $status = $row['status'];
                            ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkBoxes" id="selectAllBoxes" name="checkBoxArray[]" value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $list;?> .</td>
                                    <td><?php echo $customer;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $quantity;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo $status;?></td>
                                </tr>

                            <?php
                        }
                    ?>
                </table>
            </div>
            </form>
        </div>
<!-- sale  -->


<?php
    include_once("gem/footer.php");
?>