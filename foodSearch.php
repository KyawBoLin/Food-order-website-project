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
            <img src="img/header.jpg" alt="header" class="header">
        </div>
        
    </div>
    <!-- order search -->

    <!-- category -->
    
    <div class="cate container">
        <h3 class="font size">Categories</h3>
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
                    <a href="foodSearch.php?tag=home&id=<?php echo $id; ?>&title=<?php echo $title; ?>">
                    <span class="text font"><?php echo $title; ?></span>
                    <img src =<?php echo "img/category/".$image; ?> class="inCateImage"/>
                    </a>
                </div>
                <?php
            }

        ?>
        </div>
    </div>
    <!-- category -->

     <!-- explore  -->
     <div class="exp container">
         <?php
            // search data
            if(isset($_POST['submit'])){
                $search = mysqli_real_escape_string(dbConnect(),$_POST['search']);
                $result = searchFood($search);
                if(mysqli_num_rows($result)==0){
                    echo "<h3 class='font size'>Not item found!</h3>";
                }
                ?>
                <h3 class="font size"><?php echo "Search on '".$search."'"; ?></h3>
                <?php
            }

            // category data
            if(isset($_GET['id']) && isset($_GET['title'])){
                $id = $_GET['id'];
                $title = $_GET['title'];
                $result =getFoodSearch($id,'tbl_food');
                if(mysqli_num_rows($result)==0){
                    echo "<h3 class='font size'>Not item found!</h3>";
                }
                ?>
                <h3 class="font size"><?php echo "'".$title."' Categories"; ?></h3>
                <?php
            }
         ?>
        <div class="exCon">
            <div class="barFlex">
                <?php
                    // get food data 

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
                                <img src="img/food/<?php echo $image_name; ?>" class="inImage">
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