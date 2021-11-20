<?php
    include_once("gem/header.php");
?>
<style>
    .tableContainer{
        margin-left:-110px;
    }
    table{
        width:1200px;
    }
    th{
        width:500px;
        padding:10px 0;
        text-align: center;
        border-right:4px solid rgb(216, 216, 216);
    }
    img{
        width:100px;
        border-radius:7px;
        height:70px;
    }
    tr,td{
        padding:18px 0;
        text-align:center;
        /* border-bottom: 2px solid rgb(184, 184, 184); */
    }
    .mb{
        margin-top:30px;
        margin-bottom:10px;
    }
    a{
        text-decoration:none;
    }
</style>

<!-- order  -->

<div class="con">
    <div class="conTitle bold">Ordered Foods</div>
    <?php
        if(checkSession('orderDelete')){
            echo $_SESSION['orderDelete'];
            unsetSession('orderDelete');
        }
    ?>
        <div class="tableContainer">
            <table>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Food Title</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php
                    $result = orderData();
                    $list=0;
                    $name="";
                    foreach($result as $data){
                        if($name!=$data['customer_name']){
                            
                            $id = $data['id'];
                            $list++;
                            $title = $data['food_title'];
                            $quantity = $data['quantity'];
                            $price = $data['total'];
                            $name = $data['customer_name'];
                            $contact = $data['customer_contact'];
                            $email = $data['customer_email'];
                            $address = $data['customer_address'];
                            $date = $data['order_date'];
                            $status = $data['status'];

                            ?>

                                <tr>
                                    <td><?php echo $list;?> .</td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $quantity;?> pieces</td>
                                    <td><?php echo $price;?> MMK</td>
                                    <td><?php
                                    switch($status){
                                        case "Ordered":echo "<span style='color:orange; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        case "Canceled":echo "<span style='color:red; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        case "On Delivery":echo "<span style='color:royalblue; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        case "Delivered":echo "<span style='color:green; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        default:;
                                    }
                                    ?></td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo $contact;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $address;?></td>
                                    <td>
                                        <div class="mb"><a href ="updateOrder.php?tag=order&id=<?php echo $name;?>&name=<?php echo $name;?>" class="btn-sm btn-primary">Status</a></div>
                                        <div><a href ="gem/deleteOrder.php?tag=order&id=<?php echo $name;?>" class="btn-sm btn-danger">Delete</a></div>
                                    </td>
                                </tr>
                            <?php
                        }else{
                            $id = $data['id'];
                            $title = $data['food_title'];
                            $quantity = $data['quantity'];
                            $price = $data['total'];
                            $name =$data['customer_name'];
                            $contact = "";
                            $email = "";
                            $address = "";
                            $date = $data['order_date'];
                            $status = $data['status'];

                            ?>

                                <tr>
                                    <td></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $quantity;?> pieces</td>
                                    <td><?php echo $price;?> MMK</td>
                                    <td><?php
                                    switch($status){
                                        case "Ordered":echo "<span style='color:orange; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        case "Canceled":echo "<span style='color:red; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        case "On Delivery":echo "<span style='color:royalblue; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        case "Delivered":echo "<span style='color:green; font-weight:bold; font-size:15px;'>".$status."</span>";break;
                                        default:;
                                    }
                                    ?></td>
                                    <td><?php echo $date;?></td>
                                    <td><?php echo $contact;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $address;?></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</div>
<!-- order  -->


<?php
    include_once("gem/footer.php");
?>