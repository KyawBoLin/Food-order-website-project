<?php
    include_once("gem/header.php");

    // calculate for profit

    // sale
    $sale = profit('total','tbl_sale');
    $rowSale = mysqli_fetch_assoc($sale);
    $totalSale = $rowSale['Total'];
    $totalSaleShow = number_format($totalSale,2,'.','');

    // expense
    $expense = profitExpense('cost','tbl_expense');
    $rowExpense = mysqli_fetch_assoc($expense);
    $totalExpense = $rowExpense['Total'];
    $totalExpenseShow = number_format($totalExpense,2,'.','');

    // profit

    $profit = $totalSale - $totalExpense;
    $profitShow = number_format($profit,2,'.','');

    $monthCurrent = date("F",time());
    $year = date("Y",time());

    // insert data into tbl_profit

    if(isset($_POST['insert'])){
        $sale = $_POST['sale'];
        $expense = $_POST['expense'];
        $profit = $_POST['profit'];
        $month = $_POST['monthCurrent'];
        $year = $_POST['year'];

        // check month and update
        $result = getDataProfit($month);
        $rowCheckMonth = mysqli_fetch_assoc($result);
        $checkMonth = $rowCheckMonth['months'];
        if($checkMonth==$month){
            $updateProfit = checkMonth($month,$sale,$expense,$profit,$year);
        }else{
            $profitResult = insertProfit($month,$sale,$expense,$profit,$year);
            if($profitResult=='ok'){
                header("Location:profit.php?tag=revenue");
            }
            $msg="";
            switch($profitResult){
                case "ok":$msg = "Data insert is successful.";break;
                case "not":$msg= "Data insert is unsuccessful.";break;
                default:;
            }

            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Notice !</strong> ".$msg."
            </button>
            </div>
            ";  
        }    
    }
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
    .box{
        width:350px;
        display:flex;
        flex-direction:row;
    }
</style>

<!-- current profit  -->
<div class="con">
    <div class="conTitle bold">Current Month Report</div>
    <div class="tableContainer">
        <!-- profit  -->
    <form action="" method="post">
        <table>
            <tr>
                <th>Sale</th>
                <th>Expense</th>
                <th>Profit</th>
                <th>Months</th>
                <th>Year</th>
                <th></th>
            </tr>
            <tr>
                <td><input type="hidden" name="sale" value="<?php echo $totalSaleShow; ?>"><?php echo $totalSaleShow; ?> mmk</td>
                <td><input type="hidden" name="expense" value="<?php echo $totalExpenseShow; ?>"><?php echo $totalExpenseShow; ?> mmk</td>
                <td><input type="hidden" name="profit" value="<?php echo $profitShow; ?>"><?php echo $profitShow; ?> mmk</td>
                <td><input type="hidden" name="monthCurrent" value="<?php echo $monthCurrent; ?>"><?php echo $monthCurrent; ?></td>
                <td><input type="hidden" name="year" value="<?php echo $year; ?>"><?php echo $year; ?></td>
                <td><button class="btn-sm btn-info" name="insert">Insert</button></td>
            </tr>
        </table>
    </form>
        <!-- profit  -->
    </div>
</div>
<!-- current profit  -->
<?php
if(isset($_POST['submit'])){
    $select = $_POST['select'];
    $checkBox = $_POST['checkBox'];

    $checkBoxResult = updateStatus($checkBox,$select);
}

?>
<!-- profit compare  -->
<div class="con">
    <div class="conTitle bold">Company Profit Compare</div>
    <form action="" method="post">
    <div class="box">
        <select class="form-control w-50" name="select">
            <option value="Current Month">Current Month</option>
            <option value="Previous Month">Previous Month</option>
            <option value="After Previous Month">After Previous Month</option>
        </select>
        <button class="btn-sm btn-primary mx-2" name="submit">Submit</button>
    </div>
    <?php
        if(checkSession('deleteProfit')){
            echo $_SESSION['deleteProfit'];
            unsetSession('deleteProfit');
        }
    ?>
    <div class="tableContainer">
        <!-- profit  -->
        
        <table>
            <tr>
                <th>Select</th>
                <th>No</th>
                <th>Sale</th>
                <th>Expense</th>
                <th>Profit</th>
                <th>Months</th>
                <th>Year</th>
                <th>Status</th>
                <th></th>
            </tr>
            <?php
            // get data from profit table

            $profitGetResult = getData('tbl_profit');
            $list="";
            while($row = mysqli_fetch_assoc($profitGetResult)){
                $list++;
                $id = $row['id'];
                $month = $row['months'];
                $sale = $row['sale'];
                $expense = $row['expense'];
                $profit = $row['profit'];
                $year = $row['year'];
                $status = $row['status'];
                ?>
                    <tr>
                        <td><input type="checkbox" name="checkBox" value="<?php echo $id;?>"></td>
                        <td><?php echo $list; ?> .</td>
                        <td><?php echo $sale; ?> mmk</td>
                        <td><?php echo $expense; ?> mmk</td>
                        <td><?php echo $profit; ?> mmk</td>
                        <td><?php echo $month; ?></td>
                        <td><?php echo $year; ?></td>
                        <td><?php echo $status;?></td>
                        <td><a href="gem/deleteProfit.php?id=<?php echo $id;?>" class="btn-sm btn-danger">Delete</a></td>
                    </tr>

                <?php
            }
        ?>
        </table>
        <!-- profit  -->
    </div>
    </form>
</div>
<!-- profit compare  -->

<?php
    include_once("gem/footer.php");
?>