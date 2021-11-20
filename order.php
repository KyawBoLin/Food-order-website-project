<?php
    include_once("partial/header.php");

    // user information
    $id = "";
    $message="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string(dbConnect(),$_POST['username']);
        $contact = mysqli_real_escape_string(dbConnect(),$_POST['contact']);
        $email = mysqli_real_escape_string(dbConnect(),$_POST['email']);
        $address = mysqli_real_escape_string(dbConnect(),$_POST['address']);
        $result = userInfo($name,$contact,$email,$address);
        if($result=="ok"){
            setSession('name',$name);
            header("Location:finalOrder.php?name=$name&id=$id&tag=food");
        }
        $msg="";
        switch($result){
            case "ok":$msg = "Data update is successful.";break;
            case "not":$msg= "Need to fill all information";break;
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
    <!-- order form  -->
    
    <div class="ordCon">
        
            <img src="img/pictures-of-food-background.jpg" class="food_background"/>
        
            <div class="ordIn2">
                <h3 class="text-center font text-white">Fill this form to confirm your order</h3>
                <form action="" method="post" class="ordForm">
                    <fieldset class="fi1 po3">
                        <legend class="leg po4 font text-white">Delivery Details</legend>
                        <div class="sel2">
                            <h5 class="bold text-white">Full Name</h5>
                            <input type="username" name="username" class="ftIn ftIn-ww" placeholder="Username"/>
                            <h5 class="bold text-white">Phone Number</h5>
                            <input type="phno" name="contact" class="ftIn ftIn-ww" placeholder="09-XXX XXX XXX"/>
                            <h5 class="bold text-white">Email</h5>
                            <input type="email" name="email" class="ftIn ftIn-ww" placeholder="Email"/>
                            <h5 class="bold text-white">Address</h5>
                            <textarea type="text" name="address" row="15" class="ftIn ftIn-ww" placeholder="No,Street,City."></textarea><br>
                            <button class="btn btn-danger" type="submit" name="submit">Confirm Order</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        
    </div>
    <br>
    <!-- order form  -->

<?php
    include_once("partial/footer.php");
?>