<?php 
    include_once("gem/header.php");
?>

<style>
    .inCon{
        /* background-color: royalblue; */
        display:flex;
        flex-wrap:wrap;
        width:91%;
        margin-left:50px;
    }
    .each{
        width:250px;
    }
    .chart{
        background-color: white;
        padding:40px 0;
        padding-left:20%;
    }
</style>
    <!-- container -->
        <div class="con">
            <div class="conTitle bold">Dashboard</div>
            <div class="inCon">

                <!-- Admin  -->
                <?php
                    $admin_result = getData('tbl_admin');
                    $admin_count = mysqli_num_rows($admin_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $admin_count; ?></div>
                    <div class="smFont">Admins</div>
                </div>

                <!-- Advertisement  -->
                <?php
                    $adv_result = getData('tbl_advertisement');
                    $adv_count = mysqli_num_rows($adv_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $adv_count;?></div>
                    <div class="smFont">Advertisements</div>
                </div>

                <!-- Categories  -->
                <?php
                    $cat_result = foodCategory();
                    $cat_count = mysqli_num_rows($cat_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $cat_count;?></div>
                    <div class="smFont">Categories</div>
                </div>

                <!-- FAQ -->
                <?php
                    $faq_result = getData('tbl_faq');
                    $faq_count = mysqli_num_rows($faq_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $faq_count;?></div>
                    <div class="smFont">FAQ Questions</div>
                </div>

                 <!-- feedback --->
                 <?php
                    $feedback_result = getFeedback();
                    $feedback_count = mysqli_num_rows($feedback_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $feedback_count;?></div>
                    <div class="smFont">Customer's Feedbacks</div>
                </div>

                <!-- food --->
                <?php
                    $food_result = foodCategory();
                    $food_count = mysqli_num_rows($food_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $food_count;?></div>
                    <div class="smFont">Foods</div>
                </div>

                <!-- order --->
                <?php
                    $order_result = order('Ordered');
                    $order_count = mysqli_num_rows($order_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $order_count;?></div>
                    <div class="smFont">Ordered Foods</div>
                </div>

                <!-- Total Income --->
                <?php
                    $income_result = saleAmount();
                    $row = mysqli_fetch_assoc($income_result);
                    $income = $row['Total'];
                    $income = number_format($income,2,'.',',');
                ?>
                <div class="each">
                    <div class="bold"><?php echo $income;?></div>
                    <div class="smFont">Total Income kyats per month</div>
                </div>

                <!-- customer's message --->
                <?php
                    $message_result = getMessage();
                    $message_count = mysqli_num_rows($message_result);
                ?>
                <div class="each">
                    <div class="bold"><?php echo $message_count;?></div>
                    <div class="smFont">New Messages</div>
                </div>
            </div>
        </div> 
        <div class="chart">
            <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);
               
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Months', 'Sales', 'Expenses', 'Profit'],
                    <?php
                        // after previous month
                        $afterPreviousResult = getMonthProfit('After Previous Month');
                        while($row = mysqli_fetch_assoc($afterPreviousResult)){
                            $afterPreviousMonth = $row['months'];
                            $afterPreviousSale = $row['sale'];
                            $afterPreviousExpense = $row['expense'];
                            $afterPreviousProfit = $row['profit'];
                            $afterPreviousYear = $row['year'];
                            
                        }

                        // previous month
                        $previousResult = getMonthProfit('Previous Month');
                        while($row = mysqli_fetch_assoc($previousResult)){
                            $previousMonth = $row['months'];
                            $previousSale = $row['sale'];
                            $previousExpense = $row['expense'];
                            $previousProfit = $row['profit'];
                            $previousYear = $row['year'];
                            
                        }

                        //current month
                        $currentResult = getMonthProfit('Current Month');
                        while($row= mysqli_fetch_assoc($currentResult)){
                            $currentMonth = $row['months'];
                            $currentSale = $row['sale'];
                            $currentExpense = $row['expense'];
                            $currentProfit = $row['profit'];
                            $currentYear = $row['year'];
                        }
                
                    ?>
                    
                    ['<?php echo $afterPreviousMonth;?>',<?php echo $afterPreviousSale;?>,<?php echo $afterPreviousExpense;?>,<?php echo $afterPreviousProfit;?>],
                    ['<?php echo $previousMonth;?>', <?php echo $previousSale;?>, <?php echo $previousExpense;?>, <?php echo $previousProfit;?>],
                    ['<?php echo $currentMonth;?>', <?php echo $currentSale;?>, <?php echo $currentExpense;?>, <?php echo $currentProfit;?>],
                    ]);

                    var options = {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: <?php echo $previousYear;?> ',
                    }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        </div>

        
        
    <!-- container -->
<?php
include_once("gem/footer.php");
?>