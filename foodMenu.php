<?php
    include_once('partial/header.php');
?>
<style>
    .barFlex{
        display:flex;
        flex-direction: row;
        flex-wrap:wrap;
        width:1000px;
    }
    .eachEx{
        width:400px;
    }
    @media(max-width:374px){
        .exCon{
            display:flex;
        }
        .Box{
            margin-left:350px;
        }
    }
</style>
     <!-- explore  -->
    <div class="exp container">
        <h3 class="font size">Foods Menu</h3>
        <?php

            // cancel button 

            if(isset($_POST['cancel'])){
                setSession('final_food',"<div style='color:green; margin-bottom:20px;'>Your ordered foods are successful and 'Have a good day'.</div>");
                unsetSession('name');
                header("Location:index.php?tag=home");
            }

            if(checkSession('select_food')){
                echo $_SESSION['select_food'];
                unsetSession('select_food');
                ?>
                    <!-- cancel button for add cart  -->

                    <form action="" method="post">
                        <button class="btn btn-danger" type="submit" name="cancel">Cancel for add cart</button>
                    </form>
                <?php
            }
        ?>
        <div class="exCon">
            <div class="barFlex">
                <?php
                
                    // get food data 

                    $result = getData('tbl_food');
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        $category_id = $row['category_id'];

                        ?>
                        <div class="eachEx">
                            <div class="inside1">
                                <img src="<?php echo IMG_URL;?>food/<?php echo $image_name; ?>" class="inImage">
                            </div>
                            <div class="inside2">
                                <div class="bold"><?php echo $title; ?></div>
                                <div class="bold"><?php echo $price; ?> MMK</div>
                                <div class="op"><?php echo $description; ?></div>
                                <a href="<?php
                                    if(checkSession('name')){
                                        $name = $_SESSION['name'];
                                        echo "finalOrder.php?id=$id&name=$name&tag=food";
                                    }else{
                                        echo "order.php?id=$id&tag=food";
                                    }
                                ?>">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            
            </div>
        </div>
        
    </div>
    <!-- explore -->

<?php
    include_once('partial/footer.php');
?>