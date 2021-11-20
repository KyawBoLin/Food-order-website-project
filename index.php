<?php
    include_once('partial/header.php');
?>
<style>
    .form1{
        display:flex;
    }
    .block{
        padding:15px;
    }
    .darea{
        width:120px;
    }
    @media(max-width:856px){
        .form1{
            width:500px;
        }
    }
    @media(max-width:472px){
        .form1{
            width:350px;
        }
    }
</style>
    <!-- order search -->
    <div class="ord">
        
        <form class="sec" action="foodSearch.php" method="post">
            <input class="in" type="text" placeholder="Search Foods" name="search">
            <button class="but" type="submit" name="submit">Search</button>
        </form>
        <div class="back">
            <img src="<?php echo IMG_URL;?>header.jpg" alt="header" class="header">
        </div>
        
    </div>
    <!-- order search -->

    <!-- category -->
    
    <div class="cate container">
        <h3 class="font size">Categories</h3>
        <?php
            if(checkSession('final_food')){
                echo $_SESSION['final_food'];
                unsetSession('final_food');
            }
        ?>
        <div class="cateImage">

        <?php

            // get data from database

            $result = getData("tbl_category");
            
            while($row=mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $title = $row['title'];
                $image = $row['image_name'];
                ?>
                <div class="block">
                    <a href="foodSearch.php?tag=home&id=<?php echo $id;?>&title=<?php echo $title; ?>">
                    <span class="text font"><?php echo $title; ?></span>
                    <img src =<?php echo IMG_URL."category/".$image; ?> class="inCateImage"/>
                    </a>
                </div>
                <?php
            }

        ?>
        </div>
    </div>
    <!-- category -->
    
    <!-- explore  -->
    <div class="container">

        <?php

        // get data advertisement 

            $adverResult = getData("tbl_advertisement");

            while($row=mysqli_fetch_assoc($adverResult)){
                $adverImg = $row['image_name'];
                ?>

                <img src="<?php echo IMG_URL;?>adver/<?php echo $adverImg; ?>" class="adver">
                
                <?php
            }
        ?>
       
    </div>
    <!-- explore -->

    <!-- customer feedback -->
    <div class="msgBox container">
        <h3 class="font size">Customer Feedback</h3>
        <?php

            // insert feedback message 

            if(isset($_POST['sent'])){
                $message = mysqli_real_escape_string(dbConnect(),$_POST['msgBox']);

                $result = feedbackMsg($message);
                if($result=="ok"){
                    echo "<span style='color:green;'>Already Sent Message</span>";
                }else{
                    echo "<span style='color:red;'>Unsent Message</span>";
                }
            }
        ?>
        <table>
            <tr>
                <td><div class="responseBox">
                    <?php

                        // get feedback message 

                        $resultFeedback = getFeedbackData('tbl_feedback');
                        while($row = mysqli_fetch_assoc($resultFeedback)){
                            $message = $row['msg'];
                            $date = $row['date'];
                            ?>
                            <div class="each">
                                <div class="eachMsg"><?php echo $message; ?></div>
                                <div class="eachMsg darea"><?php echo $date; ?></div>
                            </div>
                            <?php
                        }
                    ?>
                    
                </div></td>
            </tr>
            <tr>
                <td class="tableMsg">
                    <form action="" method="post" class="form1">
                        <textarea class="form-control area" placeholder="Please, say something about our website!" name="msgBox"></textarea>
                        <button class="btn-sm btn-primary" name="sent">Send</button> 
                    </form> 
                </td>
            </tr>
        </table>
    </div>
    <!-- customer feedback -->

<?php
    include_once('partial/footer.php');
?>