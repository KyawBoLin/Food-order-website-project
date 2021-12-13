<?php
    include_once("partial/header.php");
?>
<style>
.hide{
    height:0px;
    overflow: hidden;
    transition:height 0.9s ease-in-out;
}
.myDiv:hover+.hide{
    height:500px;
}


</style>
<!-- Customer -->
    <div class="customer_page container">
        <h3 class="font size text-center">Customer Care</h3>
        <div>
            <h5 class="font size bold" id="help_center">Help Center</h5>
            <div class="eachContainer">
                <div class="insideEach bold">FAQ</div>
                <?php
                    $helpResult = getFaq(1,'tbl_faq');
                    while($helpData = mysqli_fetch_assoc($helpResult)){
                        $question = $helpData['question'];
                        $answer = $helpData['answer'];
                        ?>
                            <div class="qandans">
                                <div style="color:royalblue" class="myDiv"><?php echo $question; ?></div>
                                <div class='hide'><?php echo $answer; ?></div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div>
            <h5 class="font size bold" id="how_to_buy">How to Buy</h5>
            <div class="eachContainer">
                <div class="insideEach bold">FAQ</div>
                <?php
                    $buyResult = getFaq(2,'tbl_faq');
                    while($buyData = mysqli_fetch_assoc($buyResult)){
                        $question = $buyData['question'];
                        $answer = $buyData['answer'];
                        ?>
                            <div class="qandans">
                                <div style="color:royalblue" class="myDiv"><?php echo $question; ?></div>
                                <div class='hide'><?php echo $answer; ?></div>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <h5 class="font size bold" id="about_delivery">About Delivery</h5>
            <div class="eachContainer">
                <div class="insideEach bold">FAQ</div>
                <?php
                    $delResult = getFaq(3,'tbl_faq');
                    while($delData = mysqli_fetch_assoc($delResult)){
                        $question = $delData['question'];
                        $answer = $delData['answer'];
                        ?>
                            <div class="qandans">
                                <div style="color:royalblue" class="myDiv"><?php echo $question; ?></div>
                                <div class='hide'><?php echo $answer; ?></div>
                            </div>
                        <?php
                    }
                ?>
            </div>

            <h5 class="font size bold" id="payment">Payment Method</h5>
            <div class="eachContainer">
                <div class="insideEach bold">FAQ</div>
                <?php
                    $payResult = getFaq(4,'tbl_faq');
                    while($payData = mysqli_fetch_assoc($payResult)){
                        $question = $payData['question'];
                        $answer = $payData['answer'];
                        ?>
                            <div class="qandans">
                                <div style="color:royalblue" class="myDiv"><?php echo $question; ?></div>
                                <div class='hide'><?php echo $answer; ?></div>
                            </div>
                        <?php
                    }
                ?>
            </div>

            <h5 class="font size bold">Address</h5>
            <div class="eachContainer">
                South Okkalapa,Yangon.
            </div>
        </div>
    </div>
<!-- Customer  -->

<?php
    include_once("partial/footer.php");
?>