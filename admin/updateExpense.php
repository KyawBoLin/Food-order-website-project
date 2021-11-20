<?php
    include_once("gem/header.php");

    // expense get method
    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $result = getCostUpdate($id);
        if(mysqli_num_rows($result)==0){
            header("Location:expense.php?tag=revenue");
        }
        while($row = mysqli_fetch_assoc($result)){
            $about = $row['about'];
            $cost = $row['cost'];
            $date = $row['date'];
            $status = $row['status'];
        }
    }

    // update data

    if(isset($_POST['submit'])){
        $aboutUpdate = $_POST['about'];
        $costUpdate = $_POST['cost'];
        $dateUpdate = $_POST['date'];
        $statusUpdate = $_POST['status'];

        $updateResult = updateCost($id,$aboutUpdate,$costUpdate,$dateUpdate,$statusUpdate);
        if($updateResult=='ok'){
            setSession('updateCost',"<div style='color:green; margin-bottom:20px;'>Cost update is successful.</div>");
            header("Location:expense.php?tag=revenue");
        }
        $msg="";
        switch($updateResult){
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

    if(isset($_POST['cancle'])){
        header("Location:expense.php?tag=revenue");
    }
?>

    <style>
        .ra{
            margin-right:20px;
        }
        .ques{
            width:600px;
        }
        .w{
            width:130px;
        }
        .mmk{
            display: flex;
            flex-direction: row;
            align-items: center;
        }
    </style>
    <!-- update cost  -->
            <div class="con">
                <div class="conTitle bold" style="color:royalblue">Update Cost</div>
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <table style="width:1100px">
                        <tr>
                            <td><strong>About :</strong></td>
                            <td>
                                <textarea class="form-control ques" placeholder="Cost for what?" name="about"><?php echo $about; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Cost Amount :</strong></td>
                            <td class="mmk">
                                <input type="text" class="form-control w-50" name="cost" value="<?php echo $cost; ?>">
                                <span>&nbsp;&nbsp;MMK</span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date :</strong></td>
                            <td>
                                <input type="date" class="form-control w-50" name="date" value="<?php echo $date; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Status :</strong></td>
                            <td>
                               <select name="status" class="form-control w">
                                   <option value="">Click Me</option>
                                   <option value="Fixed Cost" <?php
                                   if($status == "Fixed Cost"){
                                       echo "selected";
                                   }
                                   ?>>Fixed Cost</option>
                                   <option value="Daily Cost" <?php
                                   if($status == "Daily Cost"){
                                        echo "selected";
                                    }
                                   ?>>Daily Cost</option>
                               </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" class="btn btn-primary ra">Confirm</button>
                                <button type = "cancle" name="cancle" class="btn btn-light">Cancle</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
    <!--  update cost  -->
    
    <?php
        include_once("gem/footer.php");
    ?>