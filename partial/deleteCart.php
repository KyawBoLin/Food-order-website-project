<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

if(isset($_GET['id_select']) && isset($_GET['id']) && isset($_GET['name'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $id_select = $_GET['id_select'];
    $result = deleteCart($id_select);
    if($result=="ok"){
        setSession('delete_cart','<div style="color:lightgreen; margin-bottom:20px;" class="text-center">Delete successful.</div>');
        header("Location:../finalOrder.php?id=$id&name=$name&tag=food");
    }else{
        setSession('delete_cart','<div style="color:red; margin-bottom:20px;" class="text-center">Delete unsuccessful.</div>');
        header("Location:../finalOrder.php?id=$id&name=$name&tag=food");
    }
}else{
    header("Location:../finalOrder.php?id=$id&name=$name&tag=food");
}

?>