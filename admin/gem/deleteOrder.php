<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

if(isset($_GET['id'])){
    $name = $_GET['id'];

    $result = orderDataDelete($name);
    $result2 = orderDataDelete2($name);
    if($result=='ok' && $result2=='ok'){
        setSession('orderDelete','<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
        header("Location:../order.php?tag=order");
    }else{
        setSession('orderDelete','<div style="color:red; margin-bottom:20px;">Delete unsuccessful.</div>');
        header("Location:../order.php?tag=order");
    }
}else{
    header("Location:../order.php?tag=order");
}

?>