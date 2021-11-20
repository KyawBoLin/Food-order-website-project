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
    .checkBox,.checkBox2{
        margin-right:7px;
    }
    .fc{
        margin:20px 0;
        color:royalblue;
    }
    .dc{
        margin:20px 0;
        color:green;
    }
    a{
        text-decoration: none;
    }
    .bo{
        width:180px;
        cursor:pointer;
        margin-right:5px;
    }
    .boCon{
        display:flex;
        flex-direction:row;
    }
</style>

<?php

    // fixed cost

    if(isset($_POST['applyFix'])){
        $bulkOption = $_POST['bulkOption'];
        switch($bulkOption){
            case "add":header("Location:addCost.php?tag=revenue");break;
            case "edit":
                $checkBoxFix=$_POST['checkBoxArray'];
                
                if($checkBoxFix[0]){
                    header("Location:updateExpense.php?tag=revenue&id=$checkBoxFix[0]");
                }else{
                    header("Location:expense.php?tag=revenue");
                };
                break;
            case "delete":
                $checkBoxFix=$_POST['checkBoxArray'];
                foreach($checkBoxFix as $checkBoxFixDelete){
                    $resultDeleteFix = deleteData($checkBoxFixDelete,'tbl_expense');
                }
            ;break;
            default:;
        }
    }

    // daily cost

    if(isset($_POST['applyDaily'])){
        $bulkOption2 = $_POST['bulkOption2'];
        switch($bulkOption2){
            case "add":header("Location:addCost.php?tag=revenue");break;
            case "edit":
                $checkBoxFix2=$_POST['checkBoxArray2'];
                
                if($checkBoxFix2[0]){
                    header("Location:updateExpense.php?tag=revenue&id=$checkBoxFix2[0]");
                }else{
                    header("Location:expense.php?tag=revenue");
                };
                break;
            case "delete":
                $checkBoxDaily=$_POST['checkBoxArray2'];
                foreach($checkBoxDaily as $checkBoxDailyDelete){
                    $resultDeleteDaily = deleteData($checkBoxDailyDelete,'tbl_expense');
                }
            ;break;
            default:;
        }
    }
?>
<!-- expense  -->
        <div class="con">
            <div class="conTitle bold">Expense Costs Per Month</div>
            <?php
                if(checkSession('updateCost')){
                    echo $_SESSION['updateCost'];
                    unsetSession('updateCost');
                }
                if(checkSession('addCost')){
                    echo $_SESSION['addCost'];
                    unsetSession('addCost');
                }
            ?>
            <h5 class="fc">Fixed Cost</h5>
            <form action="" method="post">
               <div class="boCon">
                    <select name="bulkOption" class="form-control bo">
                            <option value="so">Select Options</option>
                            <option value="add">Add Fixed Cost</option>
                            <option value="edit">Edit Fixed Cost</option>
                            <option value="delete">Delete Fixed Cost</option>
                        </select>
                    <button class="btn-sm btn-primary" name="applyFix">Apply</button>
               </div>
            <div class="tableContainer">
                <!-- fix cost  -->
                
                <table>
                    <tr>
                        <th>
                            <input type = "checkbox" class="checkBox" id="selectAllBoxes">Select All
                        </th>
                        <th>No</th>
                        <th>About</th>
                        <th>Cost</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $result = getCost('Fixed Cost','tbl_expense');
                        $list="";
                        while($row= mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $about = $row['about'];
                            $cost  = $row['cost'];
                            $cost = number_format($cost,2,'.',',');
                            $date = $row['date'];
                            $status = $row['status'];
                            ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkBoxes" id="selectAllBoxes" name="checkBoxArray[]" value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $list;?> .</td>
                                    <td><?php echo $about;?></td>
                                    <td><?php echo $cost;?> MMK</td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo "<p style='color:royalblue; font-weight:bold; font-size:17px'>".$status."</p>";?></td>
                                </tr>

                            <?php
                        }
                    ?>
                </table>
                <!-- fix cost  -->

                <!-- daily cost  -->
                <h5 class="dc">Daily Cost</h5>
                <div class="boCon">
                    <select name="bulkOption2" class="form-control bo">
                            <option value="so">Select Options</option>
                            <option value="add">Add Daily Cost</option>
                            <option value="edit">Edit Daily Cost</option>
                            <option value="delete">Delete Daily Cost</option>
                        </select>
                    <button class="btn-sm btn-success" name="applyDaily">Apply</button>
               </div>
                <table>
                    <tr>
                        <th>
                            <input type = "checkbox" class="checkBox2" id="selectAllBoxes2">Select All
                        </th>
                        <th>No</th>
                        <th>About</th>
                        <th>Cost</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $result = getCost('Daily Cost','tbl_expense');
                        $list="";
                        while($row= mysqli_fetch_assoc($result)){
                            $list++;
                            $id = $row['id'];
                            $about = $row['about'];
                            $cost  = $row['cost'];
                            $cost = number_format($cost,2,'.',',');
                            $date = $row['date'];
                            $status = $row['status'];
                            ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkBoxes2" id="selectAllBoxes2" name="checkBoxArray2[]" value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $list;?> .</td>
                                    <td><?php echo $about;?></td>
                                    <td><?php echo $cost;?> MMK</td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo "<p style='color:green; font-weight:bold; font-size:17px'>".$status."</p>";?></td>
                                </tr>

                            <?php
                        }
                    ?>
                </table>
                <!-- daily cost  -->

            </div>
            </form>
        </div>
<!-- expense  -->


<?php
    include_once("gem/footer.php");
?>