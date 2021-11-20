<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $result = deleteData($id,"tbl_message");
    if($result==1){
        setSession("deleteMessage",'<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
        header("Location:../message.php?tag=customer");
    }else{
        setSession("deleteMessage",'<div style="color:red; margin-bottom:20px;">Delete unsuccessful.</div>');
        header("Location:../message.php?tag=customer");
    }
}else{
    header("Location:../message.php?tag=customer");
}

?>