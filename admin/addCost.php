<?php
    include_once("gem/header.php");

    // add cost

    if(isset($_POST['submit'])){
        $about = $_POST['about'];
        $cost = $_POST['cost'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        if($status==null){
            $status = 'Daily Cost';
        }

        $result = insertCost($about,$cost,$date,$status);
        if($result=='ok'){
            setSession('addCost',"<div style='color:green; margin-bottom:20px;'>Data insert is successful.</div>");
            header("Location:expense.php?tag=revenue");
        }
        $msg="";
        switch($result){
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
<!-- Add FAQ  -->
        <div class="con">
            <div class="conTitle bold" style="color:royalblue">Add Cost</div>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <table style="width:1100px">
                    <tr>
                        <td><strong>About :</strong></td>
                        <td>
                            <textarea class="form-control ques" placeholder="Cost for what?" name="about"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Cost Amount :</strong></td>
                        <td class="mmk">
                            <input type="text" class="form-control w-50" name="cost">
                            <span>&nbsp;&nbsp;MMK</span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Date :</strong></td>
                        <td>
                            <input type="date" class="form-control w-50" name="date">
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Status :</strong></td>
                        <td>
                           <select name="status" class="form-control w">
                               <option value="">Click Me</option>
                               <option value="Fixed Cost">Fixed Cost</option>
                               <option value="Daily Cost">Daily Cost</option>
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
<!--  Add cost  -->

<?php
    include_once("gem/footer.php");
?>