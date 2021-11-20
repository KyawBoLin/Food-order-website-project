<?php
    include_once("gem/header.php");

    // id from get method
    $id = "";
    $getStatus="";
    $name="";
    if(isset($_GET['id']) && isset($_GET['name'])){
        $id = $_GET['id'];
        $name = $_GET['name'];
        $getResult = getStatusData($id);
        foreach($getResult as $data){
            $getStatus = $data['status'];
        }
    }
    // change status
    if(isset($_POST['ok'])){
        $status = $_POST['status_update'];
        echo $status;
        $result = status($status,$id);
        $sale = saleStatus($status,$name);
        if($result==1){
            header("Location:order.php?tag=order");
        }else{
            echo "<div style='color:red; margin-bottom:20px;'>Status change is not successful.</div>";
        }
    }

    if(isset($_POST['cancel'])){
        header("Location:order.php?tag=order");
    }
?>
<style>
    .form{
        border-radius:5px;
        border:0;
        padding:3px;
    }
</style>
<div class="con">
    <div class="conTitle bold" style="color:royalblue">Order Status</div>
    <form action="" method="post" class="form">
        <table>
            <tr>
                <td><strong>Status :</strong></td>
                <td>
                    <select name="status_update" class="form">
                        <option value="Status">Status</option>
                        <option value="Ordered" <?php
                        if($getStatus=="Ordered"){
                            echo "selected";
                        }
                        ?>>Ordered</option>
                        <option value="On Delivery" <?php
                        if($getStatus=="On Delivery"){
                            echo "selected";
                        }
                        ?>>On Delivery</option>
                        <option value="Delivered" <?php
                        if($getStatus=="Delivered"){
                            echo "selected";
                        }
                        ?>>Delivered</option>
                        <option value="Canceled" <?php
                        if($getStatus=="Canceled"){
                            echo "selected";
                        }
                        ?>>Canceled</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn-sm btn-primary mx-1" name="ok">Ok</button>
                    <button class="btn-sm btn-light" name="cancel">Cancel</button>
                </td>
            </tr>
        </table>
    </form>
</div>
    <!-- Update Food  -->
    
<?php
    include_once("gem/footer.php");
?>