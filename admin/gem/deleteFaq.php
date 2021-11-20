<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

// Delete FAQ

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = deleteData($id,'tbl_faq');
    if($result ==1){
        setSession('deleteFaq','<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
        header("Location:../faq.php?tag=customer");
    }
}else{
    header("Location:../faq.php?tag=customer");
}