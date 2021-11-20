<?php
    include_once("partial/header.php");

    // get customer data 
        $name="";
        $image="";
        $id="";
    if(isset($_GET['name']) && isset($_GET['id'])){
        $id = $_GET['id'];
        $name = $_GET['name'];

        $result = getFood($id);
        $row = mysqli_fetch_assoc($result);
        $image = $row['image_name'];
        $title = $row['title'];
        $price = $row['price'];
    }

    // insert data to database and add cart

    if(isset($_POST['add'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];
        $total = $price*$quantity;
    
        $result = cart($name,$image,$title,$price,$quantity,$total);
        $sale = saleTable($name,$title,$price,$quantity,$total);
        if($result=='ok'){
            setSession('select_food',"<div style='color:green; margin-bottom:20px;'>Selected food successful and choice another food.</div>");
            header("Location:foodMenu.php?tag=food");
        }
        $msg="";
        switch($result){
            case "ok":$msg = "Selected food successful.";break;
            case "not":$msg= "Select food unsuccessful.";break;
            default:;
        }

        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";
    }

    // unset session and order button inset the last order data

    if(isset($_POST['order'])){

        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];
        $total = $price*$quantity;
     
        $result = cart($name,$image,$title,$price,$quantity,$total);
        $sale = saleTable($name,$title,$price,$quantity,$total);
        if($result=='ok'){
            setSession('final_food',"<div style='color:green; margin-bottom:20px;'>Your ordered foods are successful and 'Have a good day'.</div>");
            unsetSession('name');
            header("Location:index.php?tag=home");
        }
        $msg="";
        switch($result){
            case "ok":$msg = "Selected food successful.";break;
            case "not":$msg= "Select food unsuccessful.";break;
            default:;
        }

        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Notice !</strong> ".$msg."
        </button>
      </div>
        ";

    }

?>

    <style>
        .ordForm{
            display:block;
            width:400px;
            margin:0 auto;
        }
        .ordIn2{
            display:flex;
            flex-direction: row;
            flex-wrap:wrap;
            width:70%;
            justify-content: space-between;
        }
        .po{
            position:absolute;
            top:31%;
            left:38%;
            color:white;
        }
        @media(max-width:1138px){
            .ordForm{
                width:400px;
            }
            .ordIn2{
                width:100%;
                left:0;
                justify-content: space-around;
            }
        }
        @media(max-width:798px){
            .food_background{
                display:none;
            }
            .ordIn2{
                position:static;
                background-color:rgb(236, 108, 130);
                padding:20px 0;
            }
            .po{
                position:static;
                color:black;
            }
        }
        @media(max-width:374px){
            .ordForm{
                width:300px;
            }
        }
    </style>
    <!-- order form  -->
    
    <div class="ordCon">
        
            <img src="img/pictures-of-food-background.jpg" class="food_background"/>
            <h3 class="text-center font po">How many foods do you want?</h3>
            <div class="ordIn2">
                
                
                    <?php
                        if(checkSession('delete_cart')){
                            echo $_SESSION['delete_cart'];
                            unsetSession('delete_cart');
                        }
                        $resultFinal = getFoodFinal($name);

                        if(mysqli_num_rows($resultFinal)!=0){
                            while($row = mysqli_fetch_assoc($resultFinal)){
                                $id_select = $row['id'];
                                $image_select = $row['image'];
                                $title_select = $row['food_title'];
                                $price_select = $row['total'];
                                $quantity_select = $row['quantity']; 
                                
                                ?>
                                <div>
                                    <fieldset class="fi1 po1 ordForm">
                                        <legend class="leg po2 font text-white">Selected Food</legend>
                                        <div class="sel">
                                            <div>
                                                <?php
                                                    if($image_select==null){
                                                        echo "Not image found.";
                                                    }else{
                                                        echo "<img src=".IMG_URL."food/".$image_select."' class='selImg'>";
                                                    }
                                
                                                ?>
                                            </div>
                                            <div class="ft">
                                                <h5 class="bold text-white"><?php echo $title_select; ?></h5>
                                                <div class="text-white">Quantity</div>
                                                <div class="text-white"><?php echo $quantity_select;?> piece</div>
                                                <div class="text-white mb-2"><?php echo $price_select; ?> MMK</div>
                                                <a href="partial/deleteCart.php?tag=food&id_select=<?php echo $id_select; ?>&name=<?php echo $name; ?>&id=<?php echo $id;?>" class="btn-sm btn-danger text-white" style="font-size:15px;">Delete Cart</a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }
                        }
                        
                    ?>
                
                <form action="" method="post">
                    <fieldset class="fi1 po1 ordForm">
                        <legend class="leg po2 font text-white">Selected Food</legend>
                        <div class="sel">
                            <div><img src="img/food/<?php echo $image;?>" class="selImg"></div>
                            <div class="ft">
                                <h5 class="bold text-white"><?php echo $title; ?></h5>
                                <input type="hidden" name="title" value="<?php echo $title; ?>">
                                <div class="text-white"><?php echo $price; ?> MMK</div>
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <div class="text-white">Quantity</div>
                                <input type="number" name="qty" class="ftIn ftIn-w" value="1" required/>
                            </div>
                        </div>
                    </fieldset>
                    <div class="my-3">
                        <button class="btn btn-primary" type="submit" name="add">Add to Cart</button>
                        <button class="btn btn-danger" type="submit" name="order">Order</button>
                    </div>
                </form>
            </div>
        
    </div>
    <br>
    <!-- order form  -->

<?php
    include_once("partial/footer.php");
?>